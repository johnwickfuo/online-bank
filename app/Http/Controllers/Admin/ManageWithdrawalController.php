<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\Wdmethod;
use App\Models\Withdrawal; // This is the correct model for withdrawals
use App\Mail\NewNotification;
use App\Traits\PingServer;
use App\Helpers\NotificationHelper;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB; // Import DB facade for transactions

class ManageWithdrawalController extends Controller
{
    use PingServer;

    // This method seems to be for processing withdrawals from a form submission
    // It handles "Paid", "On-hold", and "Rejected" actions.
    // I will keep this as is, but the new process for BTC will use updateWithdrawalStatus.
    public function pwithdrawal(Request $request)
    {
        $withdrawal = Withdrawal::where('id',$request->id)->first();
        $user = User::where('id',$withdrawal->user)->first();

        // Ensure $created_at is properly set. If $request->date is empty, use existing.
        $created_at = ($request->date != ' ') ? $request->date : $withdrawal->created_at;

        if ($request->action == "Paid") {
            Withdrawal::where('id',$request->id)
            ->update([
                'status' => 'Processed',
                'created_at'=> $created_at,
            ]);

            // Create notification for successful withdrawal
            NotificationHelper::create(
                $user,
                'Your withdrawal request of ' . $withdrawal->amount . ' via ' . $withdrawal->payment_mode . ' has been processed and approved.',
                'Withdrawal Approved',
                'success',
                'check-circle',
                route('withdrawalsdeposits')
            );

            $settings=Settings::where('id', '=', '1')->first();
            $message = "This is to inform you that your transfer request of $settings->currency$withdrawal->amount  to  $withdrawal->accountname  have approved.";

            Mail::to($user->email)->send(new NewNotification($message, 'Successful Transfer', $user->name));
        } elseif($request->action == "On-hold"){
            Withdrawal::where('id',$request->id)
            ->update([
                'status' => 'On-hold',
                'created_at'=> $created_at,
            ]);

            // Create notification for on-hold withdrawal
            NotificationHelper::create(
                $user,
                'Your withdrawal request of ' . $withdrawal->amount . ' via ' . $withdrawal->payment_mode . ' has been placed on hold. Please contact support for more information.',
                'Withdrawal On Hold',
                'warning',
                'alert-triangle',
                route('withdrawalsdeposits')
            );

            $settings=Settings::where('id', '=', '1')->first();
            $message = "This is to inform you that your transfer request of $settings->currency$withdrawal->amount to $withdrawal->accountname is currently On-hold; contact support on $settings->contact_email for more details ";

            Mail::to($user->email)->send(new NewNotification($message, 'On-hold transfer Transction', $user->name));
        } else { // This else block handles "Rejected" action

            // Ensure the user ID matches before refunding
            if($withdrawal->user == $user->id){
                User::where('id',$user->id)
                ->update([
                    'account_bal' => $user->account_bal + $withdrawal->to_deduct, // Assuming to_deduct is the amount to refund
                ]);

                Withdrawal::where('id',$request->id)
                ->update([
                    'status' => 'Rejected',
                    'created_at'=> $created_at,
                ]);

                // Create notification for rejected withdrawal
                NotificationHelper::create(
                    $user,
                    'Your withdrawal request of ' . $withdrawal->amount . ' via ' . $withdrawal->payment_mode . ' has been rejected. The funds have been returned to your account.',
                    'Withdrawal Rejected',
                    'danger',
                    'x-circle',
                    route('withdrawalsdeposits')
                );

                if ($request->emailsend == "true") {
                    Mail::to($user->email)->send(new NewNotification($request->reason,$request->subject, $user->name));
                }
            }
        }

        return redirect()->route('mwithdrawals')->with('success', 'Action Sucessful!');
    }


    /**
     * Displays the details of a specific withdrawal for admin processing.
     * This method is called when the admin clicks "View" on a withdrawal.
     *
     * @param int $id The ID of the withdrawal transaction.
     * @return \Illuminate\Contracts\View\View
     */
    public function processwithdraw($id){
        // Find the withdrawal transaction by ID.
        // Use with('duser') to eager load the related user, as the view uses $withdrawal->duser->name.
        // Using findOrFail will automatically throw a 404 if the record is not found.
        $withdrawal = Withdrawal::with('duser')->findOrFail($id);
        $method = Wdmethod::where('name', $withdrawal->payment_mode)->first();
        $user = User::where('id', $withdrawal->user)->first(); // User object is also available via $withdrawal->duser
        $settings = Settings::first(); // Fetch settings for currency display in the view

        // Return the new view for processing a single withdrawal.
        // Ensure the view path matches the file you created: resources/views/admin/process_withdrawal.blade.php
        return view('admin.process_withdrawal',[
            'withdrawal' => $withdrawal,
            'method' => $method,
            'user' => $user,
            'settings' => $settings, // Pass settings to the view
            'title'=>'Process Withdrawal Request',
        ]);
    }

    /**
     * Handles the update of a withdrawal's status (Processed, Declined, On-hold).
     * This method is called when the admin submits the form on the process_withdrawal page.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the withdrawal transaction to update.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateWithdrawalStatus(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'status' => 'required|in:Processed,Declined,On-hold', // Ensure status is one of these valid options
            'admin_comment' => 'nullable|string|max:500', // Optional: for admin notes
        ]);

        // Find the withdrawal transaction
        $withdrawal = Withdrawal::findOrFail($id);
        $oldStatus = $withdrawal->status; // Store the old status for conditional logic
        $newStatus = $request->status;   // Get the new status from the request

        // Get the user associated with this withdrawal to potentially adjust their balance
        $user = User::findOrFail($withdrawal->user);

        // Use a database transaction to ensure atomicity for status update and balance adjustment
        DB::transaction(function () use ($withdrawal, $oldStatus, $newStatus, $user, $request) {
            // Update the withdrawal status and add any admin comments
            $withdrawal->status = $newStatus;
            $withdrawal->admin_comment = $request->admin_comment; // Save admin comment
            $withdrawal->save();

            // Handle balance adjustments and notifications based on the status change
            if ($oldStatus == 'Pending' && $newStatus == 'Declined') {
                // If a pending withdrawal is declined, refund the amount.
                // For BTC withdrawals, we refund to btc_balance. For others, to account_bal.
                if ($withdrawal->payment_mode == 'Cryptocurrency' && $withdrawal->currency == 'BTC') {
                    $user->btc_balance += $withdrawal->amount; // Refund BTC amount
                } else {
                    // For fiat or other crypto withdrawals, refund to account_bal.
                    // Assuming 'amount' is the original withdrawal amount for fiat as well.
                    $user->account_bal += $withdrawal->amount;
                }
                $user->save();

                // Notification for rejected withdrawal
                NotificationHelper::create(
                    $user,
                    'Your withdrawal request of ' . number_format($withdrawal->amount, 8) . ' ' . $withdrawal->currency . ' via ' . $withdrawal->payment_mode . ' has been rejected. The funds have been returned to your account.',
                    'Withdrawal Rejected',
                    'danger',
                    'x-circle',
                    route('withdrawalsdeposits')
                );

                // You can add logic here to send an email for rejection, similar to your pwithdrawal method
                // if ($request->emailsend == "true") {
                //     Mail::to($user->email)->send(new NewNotification($request->reason, $request->subject, $user->name));
                // }

            } elseif ($oldStatus == 'Pending' && $newStatus == 'Processed') {
                // If a pending withdrawal is processed, send success notification.
                // No balance adjustment needed here as the BTC was already deducted by CryptoController upon request.
                NotificationHelper::create(
                    $user,
                    'Your withdrawal request of ' . number_format($withdrawal->amount, 8) . ' ' . $withdrawal->currency . ' via ' . $withdrawal->payment_mode . ' has been processed and approved.',
                    'Withdrawal Approved',
                    'success',
                    'check-circle',
                    route('withdrawalsdeposits')
                );

                $settings = Settings::first();
                $message = "This is to inform you that your transfer request of " . ($withdrawal->currency == 'BTC' ? number_format($withdrawal->amount, 8) . ' BTC' : $settings->currency . number_format($withdrawal->amount)) . " to {$withdrawal->accountname} has been approved.";
                Mail::to($user->email)->send(new NewNotification($message, 'Successful Transfer', $user->name));

            } elseif ($newStatus == 'On-hold') {
                // If status is set to On-hold
                NotificationHelper::create(
                    $user,
                    'Your withdrawal request of ' . number_format($withdrawal->amount, 8) . ' ' . $withdrawal->currency . ' via ' . $withdrawal->payment_mode . ' has been placed on hold. Please contact support for more information.',
                    'Withdrawal On Hold',
                    'warning',
                    'alert-triangle',
                    route('withdrawalsdeposits')
                );

                $settings = Settings::first();
                $message = "This is to inform you that your transfer request of " . ($withdrawal->currency == 'BTC' ? number_format($withdrawal->amount, 8) . ' BTC' : $settings->currency . number_format($withdrawal->amount)) . " to {$withdrawal->accountname} is currently On-hold; contact support on {$settings->contact_email} for more details ";
                Mail::to($user->email)->send(new NewNotification($message, 'On-hold transfer Transaction', $user->name));
            }
            // If status changes from Processed/Declined/On-hold to something else,
            // or if oldStatus is already the same as newStatus, no specific balance action is taken here.
        });

        // Redirect back to the manage withdrawals page with a success message
        return redirect()->route('mwithdrawals')->with('success', 'Withdrawal status updated successfully!');
    }
}


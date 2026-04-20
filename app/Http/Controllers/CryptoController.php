<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Withdrawal; // Corrected: Using the Withdrawal model

class CryptoController extends Controller
{
    // Middleware to ensure user is authenticated and potentially KYC verified
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified', 'complete.kyc']);
    }

    /**
     * Displays the Fiat to Bitcoin (BTC) swap page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showSwapPage()
    {
        $user = Auth::user();
        $settings = Settings::first(); // Assuming settings are stored in the first record

        return view('user.swap', compact('user', 'settings'));
    }

    /**
     * Handles the Fiat to Bitcoin (BTC) swap logic.
     * Deducts from fiat balance and adds to BTC balance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processSwap(Request $request)
    {
        $request->validate([
            'fiat_amount' => 'required|numeric|min:0.01', // Minimum fiat amount
        ]);

        $user = Auth::user();
        $settings = Settings::first();

        $fiatAmountToSwap = (float) $request->fiat_amount;
        $btcSwapRate = (float) $settings->btc_swap_rate; // This is 1 BTC = X Fiat

        // Ensure swap rate is set by admin and is greater than zero
        if ($btcSwapRate <= 0) {
            return back()->with('error', 'BTC swap rate is not configured or is zero. Please contact support.');
        }

        // Check if user has sufficient fiat balance
        if ($user->account_bal < $fiatAmountToSwap) {
            return back()->with('error', 'Insufficient ' . $settings->currency . ' balance for this swap.');
        }

        // Calculate BTC equivalent: Fiat Amount / (Fiat per 1 BTC)
        $btcEquivalent = $fiatAmountToSwap / $btcSwapRate;

        // Perform the swap within a database transaction to ensure atomicity
        DB::transaction(function () use ($user, $fiatAmountToSwap, $btcEquivalent, $settings) {
            // Deduct from user's fiat balance
            $user->account_bal -= $fiatAmountToSwap;
            // Add equivalent BTC to user's BTC balance
            $user->btc_balance += $btcEquivalent;
            $user->save(); // Save the updated user balances

            // You might want to log this swap transaction here if you have a general transaction log
            // For example, if you have a 'Transaction' model for all types of transactions.
        });

        return back()->with('success', 'Successfully swapped ' . $settings->currency . $fiatAmountToSwap . ' to ' . number_format($btcEquivalent, 8) . ' BTC!');
    }

    /**
     * Displays the Send Bitcoin (BTC) page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showSendBtcPage()
    {
        $user = Auth::user();
        $settings = Settings::first();

        return view('user.send-btc', compact('user', 'settings'));
    }

    /**
     * Handles the Send Bitcoin (BTC) logic.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processSendBtc(Request $request)
    {
        $request->validate([
            'btc_address' => 'required|string|min:26|max:62', // Standard BTC address length
            'btc_amount' => 'required|numeric|min:0.00000001',
        ]);

        $user = Auth::user();
        $sendAmount = (float) $request->btc_amount;
        $destinationAddress = $request->btc_address;
        $settings = Settings::first();

        // Check if user has sufficient BTC balance
        if ($user->btc_balance < $sendAmount) {
            return back()->with('error', 'Insufficient BTC balance to send.');
        }

        // In a real application, this is where you would integrate with a Bitcoin API
        // (e.g., BlockCypher, Coinbase API, etc.) to initiate the actual blockchain transaction.
        // For this project, we will simulate the deduction from the user's balance
        // and record it for admin approval.
        // You might also need to consider network fees here.

        DB::transaction(function () use ($user, $sendAmount, $destinationAddress, $settings) {
            // Deduct BTC from user's BTC balance immediately
            // This amount will be refunded if the admin declines the withdrawal.
            $user->btc_balance -= $sendAmount;
            $user->save(); // Save the updated user balance

            // Log the transaction for admin approval using the Withdrawal model
            // This ensures it appears on the mwithdrawals.blade.php page
            Withdrawal::create([
                'user' => $user->id, // Foreign key to the user
                'amount' => $sendAmount, // The amount of BTC to send
                'currency' => 'BTC', // Indicate it's BTC
                'payment_mode' => 'Cryptocurrency', // This matches the check in mwithdrawals.blade.php
                'crypto_currency' => 'Bitcoin', // Specific cryptocurrency (e.g., Bitcoin, Ethereum)
                'wallet_address' => $destinationAddress, // Store the recipient address
                'status' => 'Pending', // Default status for admin approval
                'Description' => "Bitcoin withdrawal request of {$sendAmount} BTC to {$destinationAddress}", // Using 'Description' for consistency with existing Withdrawal model
                'accountname' => $destinationAddress, // Also store in accountname for beneficiary display in mwithdrawals.blade.php
                'created_at' => now(), // Explicitly set created_at
                'updated_at' => now(), // Explicitly set updated_at
                // Add any other fields your Withdrawal model expects, e.g., 'to_deduct' if it's used for tracking.
                // For BTC, 'to_deduct' would likely be the same as 'amount' if no fees are applied here.
                'to_deduct' => $sendAmount, // Assuming 'to_deduct' is the amount that was deducted from user's balance
            ]);

            // You might also create a notification for the admin or user here
            // NotificationHelper::create(
            //     $user,
            //     "Your BTC withdrawal request of {$sendAmount} BTC is pending approval.",
            //     "BTC Withdrawal Pending",
            //     "info",
            //     "clock",
            //     route('user.btc-withdrawals.view', $withdrawalId) // Assuming a route for viewing crypto withdrawal requests
            // );
        });

        return back()->with('success', 'Your Bitcoin (BTC) send request has been submitted and is pending admin approval.');
    }
}


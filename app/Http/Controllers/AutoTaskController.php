<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Settings;
use App\Models\Plans;
use App\Models\User_plans;
use App\Models\Tp_Transaction;
use App\Mail\NewRoi;
use App\Mail\endplan;
use App\Mail\NewNotification;
use App\Models\Mt4Details;
use App\Traits\BinanceApi;
use App\Traits\Coinpayment;
use App\Models\UserInvestment;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class AutoTaskController extends Controller
{
    use Coinpayment, BinanceApi;
    /*
        Automatic toup
        calculate top up earnings and
        auto increment earnings after the increment time
    */

    public function autotopup()
    {
        // automatic roi
        $this->automaticRoi();

        // check for subscription expiration
        $this->checkSubscription();

        //do auto confirm payments
        $this->queryOrder();
        echo "Automatic ROI is working properly \n CoinPayment:";
        return $this->cpaywithcp();
    }



    public function checkSubscription()
    {
        $subscriptions = Mt4Details::where('status', 'active')->get();
        $today = now();
        $settings = Settings::find(1);

        foreach ($subscriptions as $sub) {
            $endAt = Carbon::parse($sub->end_date);
            $remindAt = Carbon::parse($sub->reminded_at);
            $singleSub = Mt4Details::find($sub->id);
            $user = User::find($singleSub->client_id);

            if ($today->isSameDay($endAt) && $singleSub->status != 'Expired') {
                //mark sub as expired
                $singleSub->status = 'Expired';
                $singleSub->save();

                //send email to user
                $messageUser = "Your subscription with MT4-ID: $sub->mt4_id have expired. To enable us continue trading on this account, please renew your subcription. \r\n To renew your subcription, login to your $settings->site_name account, go to managed accounts page and click on the renew button on the affected account.";
                Mail::to($user->email)->send(new NewNotification($messageUser, 'Your subscription have expired', $user->firstname));

                // Send email to admin
                $messageAdmin = "Subscription with MT4-ID: $sub->mt4_id have expired and the user have been notified.";
                Mail::to($settings->contact_email)->send(new NewNotification($messageAdmin, 'Your subscription have expired', 'Admin'));
            }

            if ($today->isSameDay($remindAt)) {
                // number of days for subscription to expire
                $daysLeft = $endAt->diffInDays($remindAt);

                //send email to user
                $message = "Your subscription with MT4-ID: $sub->mt4_id will expire in $daysLeft days. To avoid disconnection of your trading account, please renew your subcription before $endAt. \r\n To renew your subcription, login to your $settings->site_name account, go to managed accounts page and click on the renew button on the affected account.";
                Mail::to($singleSub->tuser->email)->send(new NewNotification($message, 'Your subscription will expire soon', $singleSub->tuser->firstname));

                $singleSub->reminded_at = $remindAt->addDay();   //2022-12-21 19:50:58
                $singleSub->save();
            }
        }
    }



    public function automaticRoi()
    {
        $settings = Settings::find(1);

        if ($settings->trade_mode == 'on') {
            $usersPlans = UserInvestment::where('active', 'yes')->get();
            $now = now();

            foreach ($usersPlans as $plan) {
                $dplan = Plans::find($plan->plan);
                $user = User::find($plan->user);

                // Determine next ROI drop time
                switch ($dplan->increment_interval) {
                    case "Monthly":
                        $nextDrop = $plan->last_growth->copy()->addDays(25);
                        break;
                    case "Weekly":
                        $nextDrop = $plan->last_growth->copy()->addDays(6);
                        break;
                    case "Daily":
                        $nextDrop = $plan->last_growth->copy()->addHours(20);
                        break;
                    case "Hourly":
                        $nextDrop = $plan->last_growth->copy()->addMinutes(49);
                        break;
                    case "Every 30 Minutes":
                        $nextDrop = $plan->last_growth->copy()->addMinutes(19);
                        break;
                    default:
                        $nextDrop = $plan->last_growth->copy()->addMinutes(4);
                        break;
                }



                $isActive = $now->lessThanOrEqualTo($plan->expire_date) && $user->trade_mode === 'on';
                $isExpired = $now->greaterThan($plan->expire_date);

                // Calculate ROI increment
                $increment = $dplan->increment_type === "Percentage"
                    ? ($plan->amount * $dplan->increment_amount) / 100
                    : $plan->increment_amount;

                // Process ROI if active and within window
                if ($isActive) {
                    $canTradeNow = $now->isWeekday() || $settings->weekend_trade === 'on';

                    if ($canTradeNow && $now->greaterThanOrEqualTo($plan->last_growth) && $now->greaterThanOrEqualTo($nextDrop)) {
                        User::where('id', $plan->user)->update([
                            'roi' => $user->roi + $increment,
                            'account_bal' => $user->account_bal + $increment,
                        ]);


                        Tp_Transaction::create([
                            'plan' => $dplan->name,
                            'user' => $user->id,
                            'amount' => $increment,
                            'user_plan_id' => $plan->id,
                            'type' => 'ROI',
                        ]);

                        UserInvestment::where('id', $plan->id)->update([
                            'last_growth' => $nextDrop,
                            'profit_earned' => $plan->profit_earned + $increment,
                        ]);

                        // if ($user->sendroiemail === 'Yes') {
                        //     Mail::to($user->email)->send(new NewRoi(
                        //         $user,
                        //         $dplan->name,
                        //         $increment,
                        //         $now->toDateTimeString(),
                        //         'New Return on Investment(ROI)'
                        //     ));
                        // }
                    }

                    // If trading not allowed on weekends, still update growth time
                    if ($now->isWeekend() && $settings->weekend_trade !== 'on' && $now->greaterThanOrEqualTo($plan->last_growth)) {
                        UserInvestment::where('id', $plan->id)->update([
                            'last_growth' => $nextDrop,
                        ]);
                    }
                }

                // Handle expired plans
                if ($isExpired) {
                    if ($settings->return_capital) {
                        User::where('id', $plan->user)->update([
                            'account_bal' => $user->account_bal + $plan->amount,
                        ]);

                        Tp_Transaction::create([
                            'plan' => $dplan->name,
                            'user' => $plan->user,
                            'amount' => $plan->amount,
                            'type' => 'Investment capital',
                        ]);
                    }

                    UserInvestment::where('id', $plan->id)->update([
                        'active' => 'expired',
                    ]);

                    // if ($user->sendinvplanemail === 'Yes') {
                    //     $objDemo = new \stdClass();
                    //     $objDemo->receiver_email = $user->email;
                    //     $objDemo->receiver_plan = $dplan->name;
                    //     $objDemo->received_amount = "{$settings->currency}{$plan->amount}";
                    //     $objDemo->sender = $settings->site_name;
                    //     $objDemo->receiver_name = $user->name;
                    //     $objDemo->date = $now;
                    //     $objDemo->subject = "Investment plan closed";

                    //     Mail::to($user->email)->send(new endplan($objDemo));
                    // }
                }
            }
        }
    }
}

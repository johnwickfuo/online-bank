<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CryptoAccount;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings; // Ensure this is imported
use App\Models\Plans;
use App\Models\User_plans;
use App\Models\Mt4Details;
use App\Models\Card;
use App\Models\CardTransaction;
use App\Helpers\NotificationHelper;
use App\Models\Deposit;
use App\Models\SettingsCont;
use App\Models\Wdmethod;
use App\Models\Withdrawal;
use App\Models\UserInvestment;
use App\Models\Tp_Transaction;
use App\Traits\PingServer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ViewsController extends Controller
{
    use PingServer;

    public function dashboard(Request $request)
    {
        // Retrieve settings and the authenticated user
        $settings = Settings::where('id', '1')->first();
        $user = User::find(auth()->user()->id); // Re-fetch user to ensure all attributes are loaded, especially new ones

        // --- IMPORTANT: Ensure 'btc_balance' column exists in your 'users' table.
        // --- If not, you will get an 'Undefined property' error.
        // --- Run the migration for 'btc_balance' if you haven't already.
        // --- Example: php artisan make:migration add_btc_balance_to_users_table --table=users
        // --- Then add $table->decimal('btc_balance', 18, 8)->default(0.00000000)->after('account_bal'); in the up() method.
        // --- And $table->dropColumn('btc_balance'); in the down() method.
        // --- After modifying, run: php artisan migrate

        // --- IMPORTANT: Ensure 'btc_receive_address' and 'btc_qr_code_path' columns exist in your 'settings' table.
        // --- If not, you will get an 'Undefined property' error.
        // --- Run the migration for 'settings' table if you haven't already.
        // --- Example: php artisan make:migration add_btc_settings_to_settings_table --table=settings
        // --- Then add $table->string('btc_receive_address')->nullable(); and $table->string('btc_qr_code_path')->nullable();
        // --- After modifying, run: php artisan migrate

        // Check if user does not have ref link then update his link
        if ($user->ref_link == '') {
            User::where('id', $user->id)
                ->update([
                    'ref_link' => $settings->site_address . '/ref/' . $user->username,
                ]);
        }

        // Give registration bonus if new
        if ($user->signup_bonus != "received" && ($settings->signup_bonus != NULL && $settings->signup_bonus > 0)) {
            User::where('id', $user->id)
                ->update([
                    'bonus' => $user->bonus + $settings->signup_bonus,
                    'account_bal' => $user->account_bal + $settings->signup_bonus,
                    'signup_bonus' => "received",
                ]);
            // Create history
            Tp_Transaction::create([
                'user' => Auth::user()->id,
                'plan' => "SignUp Bonus",
                'amount' => $settings->signup_bonus,
                'type' => "Bonus",
            ]);
        }

        // Ensure crypto account exists for the user
        if (DB::table('crypto_accounts')->where('user_id', Auth::user()->id)->doesntExist()) {
            $cryptoaccnt = new CryptoAccount();
            $cryptoaccnt->user_id = Auth::user()->id;
            $cryptoaccnt->save();
        }

        // Sum total deposited
        $total_deposited = DB::table('deposits')->where('user', $user->id)->where('status', 'Processed')->sum('amount');
        $total_deposited_pending = DB::table('deposits')->where('user', $user->id)->where('status', 'Pending')->sum('amount');
        $total_withdrawal = DB::table('withdrawals')->where('user', $user->id)->where('status', 'Processed')->sum('amount');
        $total_withdrawal_pending = DB::table('withdrawals')->where('user', $user->id)->where('status', 'Pending')->sum('amount');

        // Log user out if not active (status is not "active")
        if ($user->status != "active") {
            $request->session()->flush();
            // Redirect to a route that does not require authentication, e.g., login or home
            return redirect()->route('login'); // Assuming 'login' is your login route name
        }

        return view('user.dashboard', [
            'title' => 'Customer Dashboard',
            'settings' => $settings, // Explicitly pass settings
            'user' => $user, // Explicitly pass user (though Auth::user() is also available)
            'total_deposited' => $total_deposited,
            'total_withdrawal' => $total_withdrawal,
            'total_withdrawal_pending'=> $total_withdrawal_pending,
            'total_deposited_pending' => $total_deposited_pending,
            'withdrawals' => Withdrawal::where('user', Auth::user()->id)->orderBy('id', 'desc')->take(6)->get(),
            'cards' => \App\Models\Card::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get(),
            'deposits' =>Deposit::where('user', Auth::user()->id)->orderBy('id', 'desc')->take(4)->get(),
            'trading_accounts' => Mt4Details::where('client_id', Auth::user()->id)->count(),
            'plans' => User_plans::where('user', Auth::user()->id)->where('active', 'yes')->orderByDesc('id')->skip(0)->take(2)->get(),
            't_history' => Tp_Transaction::where('user', Auth::user()->id)
                ->where('type', '<>', 'ROI')
                ->orderByDesc('id')->skip(0)->take(10)
                ->get(),
        ]);
    }

    //Profile route
    public function profile()
    {
        $userinfo = User::where('id', Auth::user()->id)->first();
        return view('user.profile')->with(array(
            'userinfo' => $userinfo,
            'title' => 'Profile',
        ));
    }

    // editpass

    public function editpass()
    {
        $userinfo = User::where('id', Auth::user()->id)->first();
        return view('user.editpass')->with(array(
            'userinfo' => $userinfo,
            'title' => 'Reset Password',
        ));
    }

    //return add withdrawal account form view
    public function accountdetails()
    {
        return view('user.updateacct')->with(array(
            'title' => 'Update account details',
        ));
    }

//return localtransfer account form view
public function localtransfer()
{
    return view('user.localtransfer')->with(array(
        'title' => 'Local Transfer',
    ));
}
//return code1 account form view
public function code1()

{
    if(auth::user()->transferaction==1){
       return back();
    }
    return view('user.code1')->with(array(
        'title' => 'Transfer Code',
    ));
}

//return code2 account form view
public function code2()
{
     if(auth::user()->transferaction==1){
       return back();
    }
    return view('user.code2')->with(array(
        'title' => 'Transfer Code',
    ));
}


//return code2 account form view
public function code3()
{
     if(auth::user()->transferaction==1){
       return back();
    }
    return view('user.code3')->with(array(
        'title' => 'Transfer Code',
    ));
}


//return add international Transfer account form view
public function internationaltransfer()
{
    return view('user.international')->with(array(
        'title' => 'International Transfer',
    ));
}
    //support route
    public function support()
    {
        return view('user.support')
            ->with(array(
                'title' => 'Support',
            ));
    }


     //pin route
     public function pin()
     {
         return view('user.pin')
             ->with(array(
                 'title' => 'Verify Pin',
             ));
     }

    //Trading history route
    public function tradinghistory()
    {
        return view('user.thistory')
            ->with(array(
                't_history' => Tp_Transaction::where('user', Auth::user()->id)
                    ->where('type', 'ROI')
                    ->orderByDesc('id')
                    ->paginate(15),
                'title' => 'Trading History',
            ));
    }

    //Account transactions history route
    public function accounthistory()
    {
        return view('user.transactions')
            ->with(array(
                't_history' => Tp_Transaction::where('user', Auth::user()->id)
                    ->where('type', '<>', 'ROI')
                    ->orderByDesc('id')
                    ->get(),

                'withdrawals' => Withdrawal::where('user', Auth::user()->id)->orderBy('id', 'desc')
                    ->get(),
                'deposits' => Deposit::where('user', Auth::user()->id)->orderBy('id', 'desc')
                    ->get(),
                'title' => 'Account Transactions History',

            ));
    }

    //Return deposit route
    public function deposits()
    {
        $paymethod = Wdmethod::where(function ($query) {
            $query->where('type', '=', 'deposit')
                ->orWhere('type', '=', 'both');
        })->where('status', 'enabled')->orderByDesc('id')->get();

        //sum total deposited
        $total_deposited = DB::table('deposits')->where('user', auth()->user()->id)->where('status', 'Processed')->sum('amount');

        return view('user.deposits')
            ->with(array(
                'title' => 'Fund your account',
                'dmethods' => $paymethod,
                'deposits' => Deposit::where(['user' => Auth::user()->id])
                    ->orderBy('id', 'desc')
                    ->get(),
                'deposited' => $total_deposited,
            ));
    }

    //Return withdrawals route
    public function withdrawals()
    {
        $withdrawals =  Wdmethod::where(function ($query) {
            $query->where('type', '=', 'withdrawal')
                ->orWhere('type', '=', 'both');
        })->where('status', 'enabled')->orderByDesc('id')->get();

        return view('user.withdrawals')
            ->with(array(
                'title' => 'Withdraw Your funds',
                'wmethods' => $withdrawals,
            ));
    }

    public function transferview()
    {
        $settings = SettingsCont::find(1);
        if (!$settings->use_transfer) {
            abort(404);
        }
        return view('user.transfer', [
            'title' => 'Send funds to a friend',
        ]);
    }


public function fundcard(Request $request)
{
    $user = Auth::user();
    $settings = Settings::find(1);

    if ($request->amount > $user->account_bal) {
        return redirect()->back()->with('message', 'Insufficient main account balance.');
    }

    User::where('id', $user->id)->update([
        'account_bal' => $user->account_bal - $request->amount,
        'invest_account' => $user->invest_account + $request->amount,
    ]);

    Tp_Transaction::create([
        'user' => $user->id,
        'plan' => "Funded investment account with {$settings->currency}{$request->amount}",
        'amount' => $request->amount,
        'type' => "Investment Deposit",
    ]);

    return redirect()->back()->with('success', 'Investment account funded successfully.');
}






public function withdrawcard(Request $request)
{
    $user = Auth::user();
    $settings = Settings::find(1);

    if ($request->amount > $user->invest_account) {
        return redirect()->back()->with('message', 'Insufficient investment account balance.');
    }

    User::where('id', $user->id)->update([
        'account_bal' => $user->account_bal + $request->amount,
        'invest_account' => $user->invest_account - $request->amount,
    ]);

    Tp_Transaction::create([
        'user' => $user->id,
        'plan' => "Withdrawal of {$settings->currency}{$request->amount} from investment account to main balance",
        'amount' => $request->amount,
        'type' => "Withdrawal",
    ]);

    return redirect()->back()->with('success', 'Withdrawal to main balance was successful.');
}





    //Subscription Trading
    public function subtrade()
    {
        $settings = Settings::where('id', 1)->first();
        $mod = $settings->modules;
        if (!$mod['subscription']) {
            abort(404);
        }
        return view('user.subtrade')
            ->with(array(
                'title' => 'Subscription Trade',
                'subscriptions' => Mt4Details::where('client_id', auth::user()->id)->orderBy('id', 'desc')->get(),
            ));
    }


    //Main Plans route
    public function mplans()
    {
        return view('user.mplans')
            ->with(array(
                'title' => 'Main Plans',
                'plans' => Plans::where('type', 'main')->get(),
                'settings' => Settings::where('id', '1')->first(),
            ));
    }

    //My Plans route
    public function myplans($sort)
    {
        if ($sort == 'All') {
            return view('user.myplans')
                ->with(array(
                    'numOfPlan' => User_plans::where('user', Auth::user()->id)->count(),
                    'title' => 'Your packages',
                    'plans' => User_plans::where('user', Auth::user()->id)->orderByDesc('id')->paginate(10),
                    'settings' => Settings::where('id', '1')->first(),
                ));
        } else {
            return view('user.myplans')
                ->with(array(
                    'numOfPlan' => User_plans::where('user', Auth::user()->id)->count(),
                    'title' => 'Your packages',
                    'plans' => User_plans::where('user', Auth::user()->id)->where('active', $sort)->orderByDesc('id')->paginate(10),
                    'settings' => Settings::where('id', '1')->first(),
                ));
        }
    }




     public function myshares()
    {
       $activeshares =  UserInvestment::where('user', Auth::user()->id)->where('active','yes')->count();
        $pendingshares  =  UserInvestment::where('user', Auth::user()->id)->where('active','pending')->count();
         $portfolio =     UserInvestment::where('user', auth()->id()) ->sum('amount');
        return view('user.shares')
                ->with(array(

                    'title' => 'Your Investment',
                    'activeshares' =>  $activeshares,
                    'pendingshares'=>  $pendingshares,
                    'portfolio' => $portfolio,
                    'plans' => UserInvestment::where('user', Auth::user()->id)->orderByDesc('id')->paginate(3),
                    'settings' => Settings::where('id', '1')->first(),
                ));

    }
//sharesplan



public function sharesplan()
    {

            return view('user.sharesplan')
                ->with(array(

                    'title' => 'My shares Plan',
                    'plans' =>   Plans::where('type', 'main')->get(),
                    'settings' => Settings::where('id', '1')->first(),
                ));

    }

    public function sortPlans($sort)
    {
        return redirect()->route('myplans', ['sort' => $sort]);
    }

    public function planDetails($id)
    {
        $plan =  UserInvestment::find($id);
        return view('user.plandetails', [
            'title' => $plan->dplan->name,
            'plan' => $plan,
            'transactions' => Tp_Transaction::where('type', 'ROI')->where('user_plan_id', $plan->id)->orderByDesc('id')->paginate(10),
        ]);
    }


    function twofa()
    {
        return view('profile.show', [
            'title' => 'Advance Security Settings',
        ]);
    }

    // Referral Page
    public function referuser()
    {
        return view('user.referuser', [
            'title' => 'Refer user',
        ]);
    }

    public function verifyaccount()
    {
        if (Auth::user()->account_verify == 'Verified') {
             return redirect()->route('dashboard')->with('success', 'Congratulations!! Your account has been verified.');
        }
        return view('user.verify', [
            'title' => 'Verify your Account',
        ]);
    }

    public function verificationForm()
    {
        if (Auth::user()->account_verify == 'Verified') {
            return redirect()->route('dashboard')->with('success', 'Congratulations!! Your account has been verified.');
        }
        return view('user.verification', [
            'title' => 'KYC Application'
        ]);
    }



    public function tradeSignals()
    {
        $settings = Settings::where('id', 1)->first();
        $mod = $settings->modules;
        if (!$mod['subscription']) {
            abort(404);
        }

        $response = $this->fetctApi('/subscription', [
            'id' => auth()->user()->id
        ]);
        $res = json_decode($response);

        $responseSt = $this->fetctApi('/signal-settings');
        $info = json_decode($responseSt);

        return view('user.signals.subscribe', [
            'title' => 'Trade signals',
            'subscription' => $res->data,
            'set' => $info->data->settings,
        ]);
    }

     //return code1 account form view
public function loan()
{
    return view('user.loan')->with(array(
        'title' => 'Loan Application',
    ));
}
    public function binanceSuccess()
    {
        return redirect()->route('deposits')->with('success', 'Your Deposit was successful, please wait while it is confirmed. You will receive a notification regarding the status of your deposit.');
    }

    public function binanceError()
    {
        return redirect()->route('deposits')->with('message', 'Something went wrong please try again. Contact our support center if problem persist');
    }


    public function pinstatus(Request $request)
{
    $user = Auth::user();

    // Validate PIN
    if($request->pin != $user->pin){
        return response()->json([
            'success' => false,
            'message' => 'Invalid PIN. Please try again.'
        ]);
    }

    // Update PIN status
    User::where('id', $user->id)
        ->update([
            'pinstatus' => '0'
        ]);

    // Return success response
    return response()->json([
        'success' => true,
        'message' => 'PIN verified successfully',
        'redirect' => route('dashboard')
    ]);
}


  public function cardfund(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
           
        ]);
        
        
        $user = User::find(auth()->user()->id);
        
        $card = Card::where('user_id',$user->id)->first();
        
        
         if ($user->account_bal < $request->amount) {
            return redirect()->back()->with('message', 'Insufficient main account balance.');
        }
        
        // Update card balance
        $card->balance += $request->amount;
        $card->save();
        
        User::where('id', $user->id)
                ->update([
                    'account_bal' => $user->account_bal - $request->amount ,
                ]);
        
        // Create transaction record
        CardTransaction::create([
            'card_id' => $card->id,
            'user_id' => $card->user_id,
            'amount' => $request->amount,
            'currency' => $card->currency,
            'transaction_type' => 'topup',
            'transaction_reference' => 'TOP' . time() . mt_rand(1000, 9999),
            'merchant_name' => config('app.name'),
            'status' => 'completed',
            'description' => 'Card funding',
            'transaction_date' => now(),
        ]);
        
        // Create notification
        NotificationHelper::create(
            $user,
            'Your ' . ucfirst($card->card_level) . ' ' . ucfirst(str_replace('_', ' ', $card->card_type)) . ' card has been credited with ' . $card->currency . $request->amount . '.',
            'Card Top-up',
            'success',
            'trending-up',
            route('cards.view', $card->id)
        );
        
        return redirect()->back()->with('success', 'Card has been topped up successfully');
    }



 public function cardwithdrawal(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
           
        ]);
        
        $user = User::find(auth()->user()->id);
        
        $card = Card::where('user_id',$user->id)->first();
        
        // Check if card has sufficient balance
        if ($card->balance < $request->amount) {
            return redirect()->back()->with('messgae', 'Insufficient card balance');
        }
        
        // Update card balance
        $card->balance -= $request->amount;
        $card->save();
        
      User::where('id', $user->id)
                ->update([
                    'account_bal' => $user->account_bal + $request->amount ,
                ]);
        
        // Create transaction record
        CardTransaction::create([
            'card_id' => $card->id,
            'user_id' => $card->user_id,
            'amount' => -$request->amount,
            'currency' => $card->currency,
            'transaction_type' => 'deduction',
            'transaction_reference' => 'DED' . time() . mt_rand(1000, 9999),
            'merchant_name' => config('app.name'),
            'status' => 'completed',
            'description' =>  'deduction to account balance',
            'transaction_date' => now(),
        ]);
        
        // Create notification
        NotificationHelper::create(
            $user,
            'Your ' . ucfirst($card->card_level) . ' ' . ucfirst(str_replace('_', ' ', $card->card_type)) . ' card has been debited with ' . $card->currency . $request->amount . '.',
            'Card Deduction',
            'warning',
            'trending-down',
            route('cards.view', $card->id)
        );
        
        return redirect()->back()->with('success', 'Amount deducted from card successfully');
    }







}


<?php

namespace App\Http\Controllers\User;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\Plans;
use App\Models\Tp_Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Mail\NewNotification;
use App\Models\User_plans;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class UserInvPlanController extends Controller
{




public function joinplan(Request $request){
    //get user
    $user=User::where('id',Auth::user()->id)->first();
    //get plan
    $plan=Plans::where('id',$request['id'])->first();

    if(isset($request['iamount']) && $request['iamount']>0){
        $plan_price=$request['iamount'];
    }else{
        $plan_price = $plan->price;
    }




    //check if the user account balance can buy this plan
    if($user->invest_account < $plan_price){
        //redirect to make deposit
        return redirect()->back()
            ->with('message', 'Insufficient balance. Please deposit funds to continue from your main account.');


    }


    $growthStart = now();

switch ($plan->increment_interval) {
case "Monthly":
    $growthStart = $growthStart->addDays(25);
    break;
case "Weekly":
    $growthStart = $growthStart->addDays(6);
    break;
case "Daily":
    $growthStart = $growthStart->addHours(20);
    break;
case "Hourly":
    $growthStart = $growthStart->addMinutes(49);
    break;
case "Every 30 Minutes":
    $growthStart = $growthStart->addMinutes(19);
    break;
default:
    $growthStart = $growthStart->addMinutes(4);
    break;
}

    $expiration = explode(" ", $plan->expiration);
    $digit = $expiration[0];
    $frame = $expiration[1];
    $toexpire =  "add". $frame;
    $end_at = Carbon::now()->$toexpire($digit)->toDateTimeString();
   // return $end_at;


    //    Credit user the plan bonus


    //debit user
    User::where('id', $user->id)
    ->update([
        'invest_account'=>$user->invest_account-$plan_price,
    ]);

    //create history
    Tp_Transaction::create([
        'user' => $user->id,
        'plan' => $plan->name,
        'amount'=>$plan_price,
        'type'=>"Investment in $plan->name plan",
    ]);

    //save user plan
    $userplanid = DB::table('user_investments')->insertGetId([
        'plan' => $plan->id,
        'user' => Auth::user()->id,
        'amount' => $plan_price,
        'active' => 'yes',
        'inv_duration'=>$plan->expiration,
        'expire_date' => $end_at,
        'activated_at' => \Carbon\Carbon::now(),
        'last_growth' => $growthStart,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
        'invest_type' => $plan->invest_type,
    ]);

    User::where('id',Auth::user()->id)
    ->update([
      'plan'=>$plan->id,
      'user_plan' => $userplanid,
      'entered_at'=>\Carbon\Carbon::now(),
    ]);



    return redirect()->back()
      ->with('success', "You have successfully purchased $plan->name ");
}





    public function loan(Request $request){
        //get user
        $user=User::where('id',Auth::user()->id)->first();
        //get plan


        //save user laon
        $userplanid = DB::table('user_plans')->insertGetId([

            'user' => Auth::user()->id,
            'amount' => $plan_price,
            'income'=> $request['income'],
            'purpose'=> $request['purpose'],
            'duration'=>$request['duration'],
            'facility' => $request['facility'],
            'active' => 'Pending',
            'inv_duration'=>$request['duration'],
            'expire_date' => $end_at,
            'activated_at' => \Carbon\Carbon::now(),
            'last_growth' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        User::where('id',Auth::user()->id)
        ->update([

          'user_plan' => $userplanid,
          'entered_at'=>\Carbon\Carbon::now(),
        ]);

        //send notification
        $settings=Settings::where('id', '=', '1')->first();
        $message = "This is to inform you that $user->name just applied for a loan plan for $request->purpose";
        $subject ="Loan Application by $user->name ";
        Mail::to($settings->contact_email)->send(new NewNotification($message, $subject, 'Admin'));

        return redirect()->back()
          ->with('success', "You have successfully applied for a loan your laon is currently pending, you will be contacted soon.");
    }

    public function cancelPlan($plan)
    {
        $plan = User_plans::find($plan);
        $plan->active = 'cancelled';
        $plan->save();

        // credit the user his capital
        User::where('id', $plan->user)
            ->update([
                'account_bal' => Auth::user()->account_bal + $plan->amount,
            ]);

        //save to transactions history
        $th = new Tp_transaction();
        $th->plan = $plan->dplan->name;
        $th->user = $plan->user;
        $th->amount = $plan->amount;
        $th->type = "Investment capital for cancelled plan";
        $th->save();

        // Send a mail to the user informing them of their plan cancellation
        $planName = $plan->dplan->name;
        $message = "You have succesfully cancelled your $planName plan and your investment capital have been credited to your account,  If this is a mistake, please contact us immediately to reactivate it for you.";
        Mail::to(Auth::user()->email)->send(new NewNotification($message, 'Invsetment Plan Cancelled', Auth::user()->name));

        return back()->with('success', 'Plan cancelled successfully');
    }



      //Apply for loan

}

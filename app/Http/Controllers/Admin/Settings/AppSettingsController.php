<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\SettingsCont;
use Illuminate\Support\Facades\Storage; // This is no longer strictly needed for direct public_path() moves, but can remain.

class AppSettingsController extends Controller
{

    // Return view
    public function appsettingshow()
    {
        $live_timezones = timezone_identifiers_list();
        include 'currencies.php'; // Ensure this path is correct relative to the controller
        return view('admin.Settings.AppSettings.show', [
            'title' => 'Website information settings',
            'timezones' => $live_timezones,
            'currencies' => $currencies,
            'timezone' => config('app.timezone'),
            'settings' => Settings::where('id', '=', '1')->first(),
        ]);
    }

    // for front end content management
    function RandomStringGenerator($n)
    {
        $generated_string = "";
        $domain = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $len = strlen($domain);
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, $len - 1);
            $generated_string = $generated_string . $domain[$index];
        }
        // Return the random generated string
        return $generated_string;
    }

    // updatertransfercodes
    public function updatertransfercodes(Request $request){
        Settings::where('id', '1')
            ->update([
                'code1'=> $request->code1,
                'code2'=> $request->code2,
                'code3'=> $request->code3,
                'code1status' => $request->code1status,
                'code2status' => $request->code2status,
                'code3status' => $request->code3status,
                'code1message'=> $request->code1message,
                'code2message'=> $request->code2message,
                'code3message'=> $request->code3message,
                'otp'=>$request->otp,
            ]);

            return redirect()->back()->with('success', 'Settings Saved successfully');
    }
    // update wensite information
    public function updatewebinfo(Request $request)
    {
        $this->validate($request, [
            'logo' => 'mimes:jpg,jpeg,png|max:500|image',
            'favicon' => 'mimes:jpg,jpeg,png,ico|max:500',
        ]);

        $settings = Settings::where('id', '=', '1')->first();

        // --- Handle Logo Upload ---
        $path = $settings->logo; // Keep existing path by default
        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            // CORRECTED: Target public_html/public/photos
            $destinationPath = public_path('public/photos'); 

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true); // Create directory with permissions
            }

            // Delete old logo if it exists and is in the public_html/public/photos directory
            if ($settings->logo && str_starts_with($settings->logo, 'public/photos/') && file_exists(public_path($settings->logo))) {
                unlink(public_path($settings->logo));
            }
            
            $imageName = time().'_logo.'.$file->extension();
            $file->move($destinationPath, $imageName);
            $path = 'public/photos/' . $imageName; // Path relative to public_html
        } else { // If no new file is uploaded, retain the old path
            $path  = $settings->logo;
        }

        // --- Handle Favicon Upload ---
        $pathfav = $settings->favicon; // Keep existing path by default
        if ($request->hasfile('favicon')) {
            $favfile = $request->file('favicon');
            // CORRECTED: Target public_html/public/photos
            $destinationPath = public_path('public/photos'); 

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true); // Create directory with permissions
            }

            // Delete old favicon if it exists and is in the public_html/public/photos directory
            if ($settings->favicon && str_starts_with($settings->favicon, 'public/photos/') && file_exists(public_path($settings->favicon))) {
                unlink(public_path($settings->favicon));
            }
            
            $favName = time().'_favicon.'.$favfile->extension();
            $favfile->move($destinationPath, $favName);
            $pathfav = 'public/photos/' . $favName; // Path relative to public_html
        } else { // If no new file is uploaded, retain the old path
            $pathfav = $settings->favicon;
        }
        
        Settings::where('id', '1')
            ->update([
                'newupdate' => $request['update'],
                'site_name' => $request['site_name'],
                'description' => $request['description'],
                'keywords' => $request['keywords'],
                'timezone' => $request['timezone'],
                'site_title' => $request['site_title'],
                'install_type' => $request['install_type'],
                'logo' => $path,
                'merchant_key' => $request->merchant_key,
                'favicon' => $pathfav,
                'tawk_to' => strip_tags($request['tawk_to']),
                'site_address' => $request['site_address'],
                'welcome_message' => $request->welcome_message,
                'whatsapp'=> $request->whatsapp,
                'tido'=> $request->tido,
                'address'=> $request->address,
                'sms'=> $request->sms,
                
            ]);

        $moreset = SettingsCont::find(1);
        $moreset->purchase_code = $request->purchase_code;
        $moreset->save();

        return redirect()->back()->with('success', 'Settings Saved successfully');
    }


    public function updatepreference(Request $request)
    {
        // Validate incoming request data, including new BTC fields
        $request->validate([
            'contact_email' => 'required|email',
            'currency' => 'required|string',
            's_currency' => 'required|string',
            'weekend_trade' => 'nullable|string',
            'location' => 'nullable|string',
            'trade_mode' => 'nullable|string',
            'enail_verify' => 'required|in:true,false',
            'googlet' => 'nullable|string',
            'enable_kyc' => 'required|in:yes,no',
            'enable_kyc_registration' => 'required|in:yes,no',
            'captcha' => 'nullable|string',
            'withdraw' => 'nullable|string',
            'return_capital' => 'nullable|in:true,false',
            'social' => 'nullable|string',
            'annouc' => 'nullable|string',
            'redirect_url' => 'nullable|url',
            'should_cancel_plan' => 'nullable|string',
            'btc_receive_address' => 'nullable|string',
            'btc_qr_code_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'btc_swap_rate' => 'nullable|numeric|min:0',
        ]);

        $settings = Settings::where('id', 1)->first();

        // Handle return_capital boolean conversion
        $return_capital = ($request->return_capital == 'true');

        // --- Handle QR Code Upload ---
        $btc_qr_code_path = $settings->btc_qr_code_path; // Keep existing path by default
        if ($request->hasFile('btc_qr_code_path')) {
            $file = $request->file('btc_qr_code_path'); // Get the uploaded file instance
            // CORRECTED: Target public_html/public/qr_codes
            $destinationPath = public_path('public/qr_codes'); 

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true); // Create directory with permissions
            }

            // Delete old QR code if it exists and is in the public_html/public/qr_codes directory
            if ($settings->btc_qr_code_path && str_starts_with($settings->btc_qr_code_path, 'public/qr_codes/') && file_exists(public_path($settings->btc_qr_code_path))) {
                unlink(public_path($settings->btc_qr_code_path));
            }
            
            // Generate a unique file name
            $imageName = time().'.'.$file->extension();
            
            // Move the new file directly into the public_html/public/qr_codes directory
            $file->move($destinationPath, $imageName);
            
            // Store the path relative to public_html (e.g., 'public/qr_codes/12345.png')
            $btc_qr_code_path = 'public/qr_codes/' . $imageName; 
        } else { // If no new file is uploaded, retain the old path
            $btc_qr_code_path = $settings->btc_qr_code_path;
        }

        // Update settings in the database
        Settings::where('id', 1)->update([
            'contact_email' => $request['contact_email'],
            'currency' => $request['currency'],
            's_currency' => $request['s_currency'],
            'weekend_trade' => $request['weekend_trade'],
            'location' => $request['location'],
            'trade_mode' => $request['trade_mode'],
            'enable_verification' => $request['enail_verify'],
            'google_translate' => $request['googlet'],
            'enable_kyc' => $request['enable_kyc'],
            'enable_kyc_registration' => $request['enable_kyc_registration'],
            'captcha' => $request['captcha'],
            'withdraw' => $request['withdraw'],
            'return_capital' => $return_capital,
            'enable_social_login' => $request['social'],
            'enable_annoc' => $request['annouc'],
            'redirect_url' => $request->redirect_url,
            'should_cancel_plan' => $request->should_cancel_plan,
            'btc_receive_address' => $request->btc_receive_address,
            'btc_qr_code_path' => $btc_qr_code_path, // Save the path relative to public_html/public
            'btc_swap_rate' => $request->btc_swap_rate,
        ]);

        return redirect()->back()->with('success', 'Settings Saved successfully and QR code uploaded!');
    }

    // Update email preference
    public function updateemail(Request $request)
    {
        Settings::where('id', '1')
            ->update([
                'mail_server' => $request['server'],
                'emailfrom' => $request['emailfrom'],
                'emailfromname' => $request['emailfromname'],
                'smtp_host' => $request['smtp_host'],
                'smtp_port' => $request['smtp_port'],
                'smtp_encrypt' => $request['smtp_encrypt'],
                'smtp_user' => $request['smtp_user'],
                'smtp_password' => $request['smtp_password'],
                'google_id' => $request['google_id'],
                'google_secret' => $request['google_secret'],
                'google_redirect' => $request['google_redirect'],
                'capt_secret' => $request['capt_secret'],
                'capt_sitekey' => $request['capt_sitekey'],
            ]);
        return redirect()->back()->with('success', 'Email Settings Saved successfully');
    }
}


<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage; // Import Storage facade

class ProfileController extends Controller
{
    //Updating Profile Route
    public function updateprofile(Request $request)
    {
        User::where('id', Auth::user()->id)
            ->update([
                'name' => $request->name,
                'dob' => $request->dob,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
        return response()->json(['status' => 200, 'success' => 'Profile Information Updated Sucessfully!']);
    }

    //update account and contact info
    public function updateacct(Request $request)
    {
        User::where('id', Auth::user()->id)
            ->update([
                'bank_name' => $request['bank_name'],
                'account_name' => $request['account_name'],
                'account_number' => $request['account_no'],
                'swift_code' => $request['swiftcode'],
                'btc_address' => $request['btc_address'],
                'eth_address' => $request['eth_address'],
                'ltc_address' => $request['ltc_address'],
                'usdt_address' => $request['usdt_address'],
            ]);
        return response()->json(['status' => 200, 'success' => 'Withdrawal Info updated Sucessfully']);
    }

    //Update Password
    public function updatepass(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = User::find(Auth::user()->id);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('message', 'Current password does not match!');
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'Password updated successfully');
    }


    public function changepin(Request $request){

       
        $user = User::find(Auth::user()->id);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('message', 'Password does not match!');
        }
        User::where('id',Auth::user()->id)
        ->update([
            'pin' => $request->pin,
           
        ]);
   

        return back()->with('success', 'Transaction Pin Updated Successfully');
    }

    // Update email preference logic
    public function updateemail(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->sendotpemail = $request->otpsend;
        $user->sendroiemail = $request->roiemail;
        $user->sendinvplanemail = $request->invplanemail;
        $user->save();
        return response()->json(['status' => 200, 'success' => 'Email Preference updated']);
    }


    // Update preferred currency
    public function updatecurrency(Request $request)
    {
        $request->validate([
            'currency' => ['nullable', 'string', 'max:10'],
        ]);

        User::where('id', Auth::user()->id)
            ->update([
                'currency' => $request->currency ?: null,
            ]);

        return redirect()->back()->with('success', 'Currency preference updated successfully!');
    }

    // update Profile photo
    public function updateprofilephoto(Request $request){
        
        $this->validate($request, [
            'photo' => 'mimes:jpg,jpeg,png|max:4000|image',
        ]);
        
        $user = Auth::user(); // Get the authenticated user
        $currentPhotoPath = $user->profile_photo_path; // Get current photo path from DB

        if($request->hasFile('photo')){
            $file = $request->file('photo'); // Get the uploaded file instance
            // CORRECTED: public_path() already points to public_html/public/, so just 'photos'
            $destinationPath = public_path('photos'); 

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true); // Create directory with permissions
            }

            // Delete old profile photo if it exists and is in the public_html/public/photos directory
            // Check if the path starts with 'photos/' (the new expected path)
            if ($currentPhotoPath && str_starts_with($currentPhotoPath, 'photos/') && file_exists(public_path($currentPhotoPath))) {
                unlink(public_path($currentPhotoPath));
            }
            
            // Generate a unique file name
            $imageName = time().'_profile.'.$file->extension(); // Added _profile to distinguish
            
            // Move the new file directly into the public_html/public/photos directory
            $file->move($destinationPath, $imageName);
            
            // Store the path relative to public_html/public (e.g., 'photos/12345_profile.png')
            $newPhotoPath = 'photos/' . $imageName; 

            // Update user's profile photo path in the database
            User::where('id', $user->id)
                ->update([
                    'profile_photo_path' => $newPhotoPath,
                ]);

            return redirect()->back()->with('success', 'Profile Photo Uploaded Successfully!');
        }
        
        return redirect()->back()->with('message', 'No new photo selected or upload failed.');
    }

   // for front end content management
   function RandomStringGenerator($n) 
   { 
       $generated_string = ""; 
       $domain = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"; 
       $len = strlen($domain); 
       for ($i = 0; $i < $n; $i++) // CORRECTED: Changed 'i++' from 'i'
       { 
           $index = rand(0, $len - 1); 
           $generated_string = $generated_string . $domain[$index]; 
       } 
       // Return the random generated string 
       return $generated_string; 
   } 
}


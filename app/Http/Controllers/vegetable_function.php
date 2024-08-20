<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use DateTime;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class vegetable_function extends Controller
{   
   public function register(Request $request){
        $rand = rand(100000,999999);
        $insert = $request->validate([
        "email"=>["required",Rule::unique("users","email")],
        "password"=>["required","confirmed",'min:3'],
        ]);

        $insert['OTP'] = $rand;
        $insert['status'] = 'Pending';
        $user = User::create($insert);
        Mail::to($request->email)->send(new WelcomeMail($user));
        return redirect()->route('verify', ['email' => $user->email]);
       
    }

    public function verify(Request $request,$email)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        
        $request->validate([
            'otp' => 'required|min:6|numeric',
        ]);
    
        $user = User::where('email', $email)->where('OTP', $request->otp)->first();
        $date = new DateTime;
        $dateTime = $date->format('Y-m-d H:i:s');

        if ($user) {
            $user->update(['status' => 'Complete', 'email_verified_at' => $dateTime]);

            Auth::login($user);
    
            return redirect()->route("index")->with('message', 'Your email was verified successfully.');
        } else {
            return redirect()->back()->with("message","Your OTP is Not match");
        }
    }
    
    public function logout(){
        Auth::logout();
        
        return redirect()->route("index");
    }
    
}

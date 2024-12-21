<?php

namespace App\Http\Controllers\managementControllers;

use App\Http\Controllers\Controller; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;


class ManagementAuthController extends Controller
{
    public function managementLogin()
    {   

        return view('management.auth.login');

    }
    public function managementLoginPost(Request $request)
    {

        
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'mobile_or_email.required' => 'Please Enter Email Address or Phone Number',
            'password.required' => 'Please Enter Password',
        ]);

        $credentials = ["email" => $request->input('email'), 'password' => $request->input('password')];

        

        if (Auth::guard('admins')->attempt($credentials)) {
            $management = Auth::guard("admins")->user();

            if ($management->status == 1) {
                $request->session()->put('management', $management); 
                $request->session()->put('user_photo',$management->admin_image);
              

                return redirect()->route('management.dashboard');
            } else {
               
                return redirect()->back()->withInput()->withErrors(['error_message' => 'Access Denied']);
            }
        } else {
           
            return redirect()->back()->withInput()->withErrors(['error_message' => 'Invalid Email Address or Phone Number Or Password']);
        }
    }






    public function managementLogout(Request $request){


        session()->flush(); // Destroy all session data
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
        Auth::guard('management')->logout();
        return redirect()->route('management.worldcheme');
    }
    
    
  
}

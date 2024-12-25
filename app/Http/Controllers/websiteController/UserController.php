<?php
namespace App\Http\Controllers\websiteController;
use App\Http\Controllers\Controller; 
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function userLogin(Request $request)
    {

        session()->put('lastRoute',URL::previous());
        return view('website.login', [
        ]);
    }

    public function userRegister(Request $request)
    {
        return view('website.regisgter', [
        ]);
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
           
            return redirect(session('lastRoute'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function registerPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile_no' => 'required|string|min:10|max:15|unique:users,mobile_no',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user-login')->with('success', 'Registration successful! Please login.');
    }
}

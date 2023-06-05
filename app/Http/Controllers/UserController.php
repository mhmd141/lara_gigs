<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }


    public function loginPost(Request $request)
    {

        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('/');
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['message' => 'Invalid credentials']);
        }
    }

    public function register()
    {
        return view( 'register');
    }


    
    public function registerPost(Request $request)
    {

        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // Log in the user
        if($user){
            Auth::login($user);
            return redirect()->intended('/');
        }
        else{
            return redirect()->back()->withErrors(['message' => 'Something went wrong']);
        }
    }


    // public function forgetpassword()
    // {
    //     return view( );
    // }
 
    // public function forgetpasswordPost(Request $request)
    // {
    //     $formFields = $request->validate([
    //         'email' => 'required|email',
    //     ]);
    
    //     $response = Password::sendResetLink($formFields);
    
    //     if ($response === Password::RESET_LINK_SENT) {
    //         return back()->with('status', 'Password reset link sent to your email!');
    //     } else {
    //         return back()->withErrors(['email' => trans($response)]);
    //     }
    // }

   // public function profile()
   // {
   //     $user = Auth::user();
   //     return view('website.profile' ,['user'=>$user]);
   // }

    

    public function logout()
    {
        Auth::logout();

        // Redirect the user to the desired page after logout
        return redirect('/login');
        // Logic for Logout the user's from website
    }
}

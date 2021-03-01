<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{
    //
    function showLogin(){
        return view('login');
    }

    function showRegister(){
        return view('register');
    }

    function doRegister(Request $request){
        $user = new User();

        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
            'confirm' => 'required|same:password',
            'address' => 'required',
            'phoneNumber' => 'required|numeric',
            'gender' => 'required'
        ]);
        
        if(User::where('username', '=', 'admin')->exists() && $request->username === 'admin'){
            $errors = new MessageBag();
            $errors->add('username', 'Username is not available');

            return redirect('/register')->withErrors($errors);
        }
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->phoneNumber = $request->phoneNumber;
        if($request->gender == "male"){
            $user->gender = "Male";
        }
        else if($request->gender == "female"){
            $user->gender = "Female";
        }
        if($request->username == "admin"){
            $user->role = "Admin";
        }
        else{
            $user->role = "Member";
        }

        $user->save();
        
        return redirect(url('/login'));
    }

    function doLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if(!Hash::check($request->password, $user->password)){
            $errors = new MessageBag();
            $errors->add('password', 'Your password is incorrect');

            return redirect('/login')->withErrors($errors);
        }

        $credential = $request->only('email', 'username', 'password');
        if($request->remember != null){
            Auth::attempt($credential, true);

            $minute = 120;
            $rememberToken = Auth::getRecallerName();
            Cookie::queue($rememberToken, Cookie::get($rememberToken), $minute);
        }
        else{
            Auth::attempt($credential);
        }

        return redirect('/');
    }

    function doLogout(){
        Auth::logout();
        
        return redirect('/');
    }
}

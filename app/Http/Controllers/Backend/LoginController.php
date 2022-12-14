<?php

namespace App\Http\Controllers\Backend;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
       return view('admin.layouts.login');
    }


    public function doLogin(Request $request)
    {
        $userInfo=$request->except('_token');
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin')->with('message','Login successful.');
        }
        return redirect()->back()->with('error','Invalid user credentials');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('message','Logging out.');
    }
}


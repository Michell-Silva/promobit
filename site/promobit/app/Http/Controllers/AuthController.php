<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dashboard()
    {
        if(Auth::check() === true){
            return view('admin.dashboard');
        }
        return redirect()->route('admin.login');

    }

    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL))
        {
           return redirect()->back()->withInput()->withErrors(['Email informado não é valido!']);
        }
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($credentials)){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->withInput()->withErrors(['Os dados informados nao conferem!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

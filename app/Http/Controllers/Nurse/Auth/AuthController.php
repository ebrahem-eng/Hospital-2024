<?php

namespace App\Http\Controllers\Nurse\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    //عرض صفحة تسجيل الدخول 

    public function login_page()
    {
        return view('nurse.Auth.login');
    }

    //التحقق من عملية تسجيل الدخول

    public function login_check(Request $request)
    {
        $check = $request->all();
        if (Auth::guard('nurse')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('nurse.dashboard');
        } else {
            return redirect()->route('nurse.login.page')->with('error_message', 'Check Email Or Password');
        }
    }

    //تسجيل الخروج

    public function logout()
    {
        Auth::guard('nurse')->logout();
        return redirect()->route('nurse.login.page');
    }
}

<?php

namespace App\Http\Controllers\DepartmentEmploye\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    //عرض صفحة تسجيل الدخول 

    public function login_page()
    {
        return view('departmentEmploye.Auth.login');
    }

    //التحقق من عملية تسجيل الدخول

    public function login_check(Request $request)
    {
        $check = $request->all();
        if (Auth::guard('departmentEmploye')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('departmentEmploye.dashboard');
        } else {
            return redirect()->route('departmentEmploye.login.page')->with('error_message', 'Check Email Or Password');
        }
    }

    //تسجيل الخروج

    public function logout()
    {
        Auth::guard('departmentEmploye')->logout();
        return redirect()->route('departmentEmploye.login.page');
    }
}

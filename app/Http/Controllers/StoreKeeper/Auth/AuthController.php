<?php

namespace App\Http\Controllers\StoreKeeper\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
        //عرض صفحة تسجيل الدخول 

        public function login_page()
        {
            return view('StoreKeeper.Auth.login');
        }
    
        //التحقق من عملية تسجيل الدخول
    
        public function login_check(Request $request)
        {
            $check = $request->all();
            if (Auth::guard('storeKeeper')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
                return redirect()->route('storeKeeper.dashboard');
            } else {
                return redirect()->route('storeKeeper.login.page')->with('error_message', 'Check Email Or Password');
            }
        }
    
        //تسجيل الخروج
    
        public function logout()
        {
            Auth::guard('storeKeeper')->logout();
            return redirect()->route('storeKeeper.login.page');
        }
    
}

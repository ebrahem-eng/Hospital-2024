<?php

namespace App\Http\Controllers\Reception\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
          //عرض صفحة تسجيل الدخول 

          public function login_page()
          {
              return view('Reception.Auth.login');
          }
      
          //التحقق من عملية تسجيل الدخول
      
          public function login_check(Request $request)
          {
              $check = $request->all();
              if (Auth::guard('reception')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
                  return redirect()->route('reception.dashboard');
              } else {
                  return redirect()->route('reception.login.page')->with('error_message', 'Check Email Or Password');
              }
          }
      
          //تسجيل الخروج
      
          public function logout()
          {
              Auth::guard('reception')->logout();
              return redirect()->route('reception.login.page');
          }

          
}

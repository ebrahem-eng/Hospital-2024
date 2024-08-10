<?php

namespace App\Http\Controllers\Patient\Auth;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    //عرض صفحة تسجيل الدخول 

    public function login_page()
    {
        return view('Patient.Auth.login');
    }

    //عرض صفحة التسجيل

    public function signup_page()
    {
        return view('Patient.Auth.signup');
    }

    //عملية التسجيل

    public function signup(Request $request)
    {
        $password = $request->input('password');
        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('PatientImage', $image, 'image');

        Patient::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($password),
            'phone' => $request->input('phone'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'status' => '1',
            'img' => $path,
        ]);

        return redirect()->back()->with('success_message', 'Patient Created Successfully');
    }


    //التحقق من عملية تسجيل الدخول

    public function login_check(Request $request)
    {
        $check = $request->all();
        if (Auth::guard('patient')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('patient.dashboard');
        } else {
            return redirect()->route('patient.login.page')->with('error_message', 'Check Email Or Password');
        }
    }

    //تسجيل الخروج

    public function logout()
    {
        Auth::guard('patient')->logout();
        return redirect()->route('patient.login.page');
    }
}

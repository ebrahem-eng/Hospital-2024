<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
       //عرض الصفحة الرئيسية للطبيب 
    
       public function index()
       {
           return view('Doctor.index');
       }
}

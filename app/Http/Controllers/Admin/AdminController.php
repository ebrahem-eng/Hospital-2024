<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //عرض الصفحة الرئيسية للادمن 
    
    public function index()
    {
        return view('Admin.index');
    }

}

<?php

namespace App\Http\Controllers\StoreKeeper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreKeeperController extends Controller
{
     //عرض الصفحة الرئيسية لامين المستودع 
    
     public function index()
     {
         return view('StoreKeeper.index');
     }
}

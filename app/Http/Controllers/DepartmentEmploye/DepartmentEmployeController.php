<?php

namespace App\Http\Controllers\DepartmentEmploye;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentEmployeController extends Controller
{
    //

    public function index()
    {
        return view('DepartmentEmploye.index');
    }
}

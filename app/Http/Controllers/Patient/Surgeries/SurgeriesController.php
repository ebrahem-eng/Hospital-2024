<?php

namespace App\Http\Controllers\Patient\Surgeries;

use App\Http\Controllers\Controller;
use App\Models\Surgeries;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurgeriesController extends Controller
{
    //

    public function index()
    {
        $surgerieses = Surgeries::where('patientID', Auth::guard('patient')->user()->id)->where('status' , 0)->get();
        return view('Patient.Surgeries.index', compact('surgerieses'));
    }

    public function history()
    {
        $surgerieses = Surgeries::where('patientID', Auth::guard('patient')->user()->id)->where('status' ,'!=' , 0)->get();
        return view('Patient.Surgeries.history', compact('surgerieses'));
    }

    public function cancel($id)
    {
        $surgeriesID = $id;
        $surgeries = Surgeries::findOrFail($surgeriesID);
        $surgeriesDate = Carbon::parse($surgeries->surgeriesDate);
        $currentDate = Carbon::now();

        if ($surgeriesDate->diffInDays($currentDate) >= 3) {
            $surgeries->update([
                'status' => '2'
            ]);
            return redirect()->back()->with('success_message', 'Surgery Canceled Successfully');
        } else {
            return redirect()->back()->with('error_message', 'Surgery cannot be canceled within 3 days of the surgery date.');
        }
    }
    
}

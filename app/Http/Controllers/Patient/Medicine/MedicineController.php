<?php

namespace App\Http\Controllers\Patient\Medicine;

use App\Http\Controllers\Controller;
use App\Models\MedicineInspectionPatient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicineController extends Controller
{
    //

    public function index()
    {
        $medicineInspections = MedicineInspectionPatient::where('patientID' , Auth::guard('patient')->user()->id)->get();
        return view('Patient.Medicine.index' , compact('medicineInspections'));
    }

    public function history()
    {
        $medicineInspections = MedicineInspectionPatient::where('patientID' , Auth::guard('patient')->user()->id)->get();
        return view('Patient.Medicine.history' , compact('medicineInspections'));
    }
}

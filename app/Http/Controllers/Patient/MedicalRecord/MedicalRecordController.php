<?php

namespace App\Http\Controllers\Patient\MedicalRecord;

use App\Http\Controllers\Controller;
use App\Models\Inspection;
use App\Models\PatientMedicalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalRecordController extends Controller
{
    //

    public function index()
    {
        $medicalRecords = PatientMedicalRecord::where('paitentID' , Auth::guard('patient')->user()->id)->get();
        return view('Patient.MedicalRecord.index' , compact('medicalRecords'));
    }

    public function inspections($id)
    {
        $medicalRecordID = $id;
        $inspections = Inspection::where('paitentMedicalRecordID', $medicalRecordID)->get();
        return view('Patient.MedicalRecord.inspections', compact('inspections', 'medicalRecordID'));
    }
}

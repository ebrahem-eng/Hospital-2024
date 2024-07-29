<?php

namespace App\Http\Controllers\Reception\MedicalRecord;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\PatientMedicalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalRecordController extends Controller
{
    //

    //عرض الصفحة الرئيسية للسجلات الطبية

    public function index()
    {
        $medicalRecords = PatientMedicalRecord::all();
        return view('Reception.MedicalRecord.index', compact('medicalRecords'));
    }

    //عرض صفحة اضافة سجل طبي جديد 

    public function create()
    {
        $doctors = Doctor::all();
        return view('Reception.MedicalRecord.create', compact('doctors'));
    }


    //  تخزين السجل الطبي في قاعدة البيانات 

    public function store(Request $request)
    {
        $patientID = $request->input('patientID');
        $doctorID =  $request->input('doctorID');
        $receptionID = Auth::guard('reception')->user()->id;
        $patient = Patient::find($patientID);

        if (!$patient) {
            return redirect()->back()->with('error_message', 'Patient Not Found. Please Enter the Correct ID');
        }

        $checkIfExist = PatientMedicalRecord::where('doctorID', $doctorID)
            ->where('paitentID', $patientID)
            ->first();

        if ($checkIfExist) {
            return redirect()->back()->with('error_message', 'Patient Already Has Medical Record For This Doctor');
        }

        PatientMedicalRecord::create([
            'doctorID' => $doctorID,
            'paitentID' => $patientID,
            'created_by_receptionist' => $receptionID,
            'details' => $request->input('details'),
        ]);

        return redirect()->route('reception.medicalRecord.index')->with('success_message', 'Medical Record Created Successfully');
    }

    //  حذف السجل الطبي من قاعدة البيانات 

    public function delete($id)
    {
        $patientMedicalRecordID = $id;
        $patientMedicalRecord = PatientMedicalRecord::findOrfail($patientMedicalRecordID);
        $patientMedicalRecord->delete();
        return redirect()->back()->with('success_message', 'Medical Record Deleted Successfully');
    }

    //عرض صفحة تعديل سجل طبي  

    public function edit($id)
    {
        $medicalRecordID = $id;
        $medicalRecord = PatientMedicalRecord::findOrfail($medicalRecordID);
        $doctors = Doctor::all();
        return view('Reception.MedicalRecord.edit', compact('medicalRecord', 'doctors'));
    }

    //  تعديل السجل الطبي في قاعدة البيانات 

    public function update(Request $request, $id)
    {
        $patientMedicalRecordID = $id;
        $patientID = $request->input('patientID');
        $medicalRecord = PatientMedicalRecord::findOrfail($patientMedicalRecordID);
        $doctorID =  $request->input('doctorID');
        $details = $request->input('details');

        $checkIfExist = PatientMedicalRecord::where('doctorID', $doctorID)
            ->where('paitentID', $patientID)
            ->first();

        if ($checkIfExist) {
            return redirect()->back()->with('error_message', 'Patient Already Has Medical Record For This Doctor');
        }
        $medicalRecord->update([
            'details' => $details,
            'doctorID' => $doctorID
        ]);
        return redirect()->back()->with('success_message', 'Medical Record Updated Successfully');
    }
}

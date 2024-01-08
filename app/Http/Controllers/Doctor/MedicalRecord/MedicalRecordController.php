<?php

namespace App\Http\Controllers\Doctor\MedicalRecord;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\PatientMedicalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalRecordController extends Controller
{
    //عرض صفحة جدول السجلات الطبية

    public function index()
    {
        $medicalRecords = PatientMedicalRecord::where('doctorID', Auth::guard('doctor')->user()->id)->get();
        return view('Doctor.MedicalRecord.index', compact('medicalRecords'));
    }

    //عرض صفحة اضافة سجل طبي جديد 

    public function create()
    {
        return view('Doctor.MedicalRecord.create');
    }


    //تخزين السجل الطبي في قاعدة البيانات 

    public function store(Request $request)
{
    $patientID = $request->input('patientID');
    $patient = Patient::find($patientID);

    if (!$patient) {
        return redirect()->back()->with('error_message', 'Patient Not Found. Please Enter the Correct ID');
    }

    $checkIfExist = PatientMedicalRecord::where('doctorID', Auth::guard('doctor')->user()->id)
        ->where('paitentID', $patientID)
        ->first();

    if ($checkIfExist) {
        return redirect()->back()->with('error_message', 'Patient Already Has Medical Record For This Doctor');
    }

    PatientMedicalRecord::create([
        'doctorID' => Auth::guard('doctor')->user()->id,
        'paitentID' => $patientID,
        'created_by_doctor' => Auth::guard('doctor')->user()->id,
        'details' => $request->input('details'),
    ]);

    return redirect()->route('doctor.medicalRecord.index')->with('success_message', 'Medical Record Created Successfully');
}

    

    //عرض صفحة تعديل بيانات سجل طبي 

    public function edit($id)
    {
        $medicalRecord = PatientMedicalRecord::findOrfail($id);
        return view('Doctor.MedicalRecord.edit', compact('medicalRecord'));
    }

    //تعديل بيانات جهاز طبي داخل قاعدة البيانات 

    public function update(Request $request, $id)
    {

        $medicalRecord = PatientMedicalRecord::findOrFail($id);

 
            $medicalRecord->update([
                'details' => $request->input('details'),
            ]);

            return redirect()->route('doctor.medicalRecord.index')->with('success_message', 'Medical Record Updated Successfully');
        
        
    }

    //حذف سجل طبي ونقله للارشيف 

    public function softDelete($id)
    {
        $medicalRecord = PatientMedicalRecord::findOrFail($id);

        $medicalRecord->delete();

        return redirect()->route('doctor.medicalRecord.index')->with('success_message', 'Medical Record Deleted Successfully');
    }

       //عرض صفحة جدول السجلات الطبية المحذوفين

       public function archive()
       {
           $medicalRecords = PatientMedicalRecord::onlyTrashed()->get();
           return view('Doctor.MedicalRecord.archive', compact('medicalRecords'));
       }

   
         //حذف السجل الطبي بشكل نهائي
   
         public function forceDelete($id)
         {
             $medicalRecord = PatientMedicalRecord::withTrashed()->where('id', $id)->first();
             if ($medicalRecord) {
              
                 $medicalRecord->forceDelete();
     
                 return redirect()->route('doctor.medicalRecord.archive')->with('success_message', 'Medical Record Deleted Successfully');
             } else {
                 return redirect()->back()->with('error_message', 'Medical Record Not Found');
             }
         }
   
       //استعادة الطبيب المحذوف من الارشيف
   
       public function restore($id)
       {
           PatientMedicalRecord::withTrashed()->where('id', $id)->restore();
   
           return redirect()->route('doctor.medicalRecord.archive')->with('success_message', 'Medical Record Restored Successfully');
       }
}

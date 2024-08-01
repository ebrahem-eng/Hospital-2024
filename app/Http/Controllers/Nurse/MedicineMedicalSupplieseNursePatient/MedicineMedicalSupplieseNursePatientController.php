<?php

namespace App\Http\Controllers\Nurse\MedicineMedicalSupplieseNursePatient;

use App\Http\Controllers\Controller;
use App\Models\InpatientMedications;
use App\Models\Inspection;
use App\Models\MedicineInspectionPatient;
use App\Models\MeidcalSuppliesInspection;
use App\Models\PatientMedicalRecord;
use App\Models\patientRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicineMedicalSupplieseNursePatientController extends Controller
{
    //

    public function newMedicineAndMedicalSuppliesPatient()
    {
        $departmentPatientRooms = patientRoom::where('status' , 1)->get();
        return view('Nurse.MedicinePatient.newMedicinePatient' , compact('departmentPatientRooms'));
    }

    public function historyMedicineAndMedicalSuppliesPatient()
    {
        $departmentPatientRooms = patientRoom::where('status' , 0)->get();
        return view('Nurse.MedicinePatient.historyMedicinePatient' , compact('departmentPatientRooms'));
    }

    public function medicineAndMedicalSuppliesPatientInspection(Request $request , $id)
    {
        $patientID = $id;
        $medicineInspections = MedicineInspectionPatient::where('patientID' , $patientID)->get();
        $patientMedicalRecordIDs = PatientMedicalRecord::where('paitentID' , $patientID)->pluck('id');
        $patientInspectionsIDs = Inspection::whereIn('paitentMedicalRecordID', $patientMedicalRecordIDs)->pluck('id');
        $medicalSuppliesInspections = MeidcalSuppliesInspection::whereIn('inspectionID' , $patientInspectionsIDs)->get();
        $patientRoomID = $request->input('patientRoomID');
        return view('Nurse.MedicinePatient.medicineMedicalSuppliesInspection' , compact('medicineInspections' , 'medicalSuppliesInspections' , 'patientRoomID') );

    }

    public function medicineGivenHistory(Request $request , $id)
    {
        $medicineInsPatientID = $id;
        $medicineGivens = InpatientMedications::where('medicineInsPatientID' , $medicineInsPatientID)->get();
        $patientRoomID = $request->input('patientRoomID');
        $medicineInsPatientID = $request->input('medicineInsPatientID');
        return view('Nurse.MedicinePatient.medicineGivenHistory' , compact('medicineGivens' , 'patientRoomID' , 'medicineInsPatientID'));
    }

    public function medicalSuppliesGivenHistory(Request $request , $id)
    {
      $medicalSuppliesInsID = $id;
      $medicalSuppliesGivens = InpatientMedications::where('medicalSuppliesInsID' , $medicalSuppliesInsID)->get();
      $patientRoomID = $request->input('patientRoomID');
      $medicalSuppliesInsID = $request->input('medicalSuppliesInsID');
      return view('Nurse.MedicinePatient.medicalSuppliesGivenHistory' , compact('medicalSuppliesGivens' , 'patientRoomID' , 'medicalSuppliesInsID'));
    }

    public function createMedicineAndMedicalSuppliesGiven(Request $request)
    {
        $patientRoomID = $request->input('patientRoomID');
        $medicineInsPatientID = $request->input('medicineInsPatientID');
        $medicalSuppliesInsID = $request->input('medicalSuppliesInsID');
        return view('Nurse.MedicinePatient.createMedicineAndMedicalGiven' , compact('patientRoomID' , 'medicineInsPatientID' , 'medicalSuppliesInsID'));
    }

    public function storeMedicineAndMedicalSuppliesGiven(Request $request)
    {

        $nurseID = Auth::guard('nurse')->user()->id;
        $medicalSuppliesInsID = $request->input('medicalSuppliesInsID');
        $medicineInsPatientID = $request->input('medicineInsPatientID');
        $patientRoomID = $request->input('patientRoomID');
        $hour = $request->input('hour');
        $date = $request->input('date');

        InpatientMedications::create([
            'date' => $date,
            'hour' => $hour,
            'patientRoomID' => $patientRoomID,
            'medicineInsPatientID' => $medicineInsPatientID,
            'medicalSuppliesInsID' => $medicalSuppliesInsID,
            'nurseID' => $nurseID,
        ]);

        return redirect()->back()->with('success_message' , 'Given Successfully');
    }
}

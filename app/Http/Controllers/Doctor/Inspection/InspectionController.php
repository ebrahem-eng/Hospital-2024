<?php

namespace App\Http\Controllers\Doctor\Inspection;

use App\Http\Controllers\Controller;
use App\Models\Inspection;
use App\Models\MedicalSupplies;
use App\Models\Medicine;
use App\Models\MedicineInspectionPatient;
use App\Models\MeidcalSuppliesInspection;
use App\Models\PatientMedicalRecord;
use App\Models\Room;
use App\Models\Surgeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InspectionController extends Controller
{
    //عرض صفحة جدول معاينات السجلات الطبية

    public function index($id)
    {
        $medicalRecordID = $id;
        $inspections = Inspection::where('paitentMedicalRecordID', $medicalRecordID)->get();
        return view('Doctor.MedicalRecord.Inspection.index', compact('inspections', 'medicalRecordID'));
    }

    //عرض صفحة اضافة معاينة جديدة لسجل طبي  

    public function create($id)
    {
        $medicalRecordID = $id;
        return view('Doctor.MedicalRecord.Inspection.create', compact('medicalRecordID'));
    }


    //تخزين السجل الطبي في قاعدة البيانات 

    public function storeInspection(Request $request)
    {
        $resultInspection = $request->input('resultInspection');
        $details = $request->input('details');
        $medicalRecordID = $request->input('medicalRecordID');
        $patientID = PatientMedicalRecord::where('id', $medicalRecordID)->value('paitentID');

        $inspectionExists = Inspection::where('resultInspection', $resultInspection)
            ->where('details', $details)
            ->where('paitentMedicalRecordID', $medicalRecordID)
            ->first();

        if ($inspectionExists) {
            $inspectionExists->update([
                'resultInspection' => $resultInspection,
                'details' => $details,
                'paitentMedicalRecordID' => $medicalRecordID,
            ]);

            $inspectionID = $inspectionExists->id;

            $medicalSuppliesInspections = MeidcalSuppliesInspection::where('inspectionID', $inspectionID)->get();

            $medicalSuppliesQuantities = [];
            $medicalSupplies = [];

            foreach ($medicalSuppliesInspections as $medicalSuppliesInspection) {
                $medicalSuppliesQuantities[] = $medicalSuppliesInspection->quantity;
                $medicalSuppliesInspectionID = $medicalSuppliesInspection->medicalSuppliesID;

                $medicalSupply = MedicalSupplies::findOrFail($medicalSuppliesInspectionID);
                $medicalSupplies[] = $medicalSupply;
            }

            $allMedicalSupplies = MedicalSupplies::all();

            return view('Doctor.MedicalRecord.Inspection.chooseMedicalSupplies', compact('inspectionID', 'medicalSuppliesQuantities', 'medicalSupplies', 'allMedicalSupplies', 'patientID'));
        } else {

            $inspection = Inspection::create([
                'resultInspection' => $resultInspection,
                'details' => $details,
                'paitentMedicalRecordID' => $medicalRecordID,
            ]);


            $inspectionID = $inspection->id;

            $medicalSuppliesInspections = MeidcalSuppliesInspection::where('inspectionID', $inspectionID)->get();

            $medicalSuppliesQuantities = [];
            $medicalSupplies = [];

            foreach ($medicalSuppliesInspections as $medicalSuppliesInspection) {
                $medicalSuppliesQuantities[] = $medicalSuppliesInspection->quantity;
                $medicalSuppliesInspectionID = $medicalSuppliesInspection->medicalSuppliesID;

                $medicalSupply = MedicalSupplies::findOrFail($medicalSuppliesInspectionID);
                $medicalSupplies[] = $medicalSupply;
            }

            $allMedicalSupplies = MedicalSupplies::all();

            return view('Doctor.MedicalRecord.Inspection.chooseMedicalSupplies', compact('inspectionID', 'medicalSuppliesQuantities', 'medicalSupplies', 'allMedicalSupplies', 'patientID'));
        }
    }


    //تخزين المستلزمات الطبية للمعاينة

    public function storeMedicalSuppliesInspection(Request $request)
    {
        $medicalSuppliesID = $request->input('medicalSuppliesID');
        $quantity = $request->input('quantity');
        $inspectionID = $request->input('inspectionID');

        MeidcalSuppliesInspection::create([
            'medicalSuppliesID' => $medicalSuppliesID,
            'quantity' => $quantity,
            'inspectionID' => $inspectionID,
        ]);

        return redirect()->back()->with('success_message', 'Medical Supplies Added Successfully');
    }


    //عرض صفحة اختيار الادوية للمعاينة

    public function chooseMedicine(Request $request, $id)
    {
        $inspectionID = $id;
        $patientID = $request->input('patientID');
        $allMedicine = Medicine::all();

        $medicineInspections = MedicineInspectionPatient::where('inspectionID', $inspectionID)->get();

        $medicineRepeatDay = [];
        $medicineDuration = [];
        $medicineQuantity = [];
        $medicineDailyAppointment = [];
        $medicineDetails = [];
        $medicines = [];

        foreach ($medicineInspections as $medicineInspection) {
            $medicineRepeatDay[] = $medicineInspection->repeat_day;
            $medicineDuration[] = $medicineInspection->duration;
            $medicineQuantity[] = $medicineInspection->quantity;
            $medicineDailyAppointment[] = $medicineInspection->daily_appointment;
            $medicineDetails[] = $medicineInspection->details;
            $medicineInspectionID = $medicineInspection->medicineID;

            $medicine = Medicine::findOrFail($medicineInspectionID);
            $medicines[] = $medicine;
        }

        return view('Doctor.MedicalRecord.Inspection.chooseMedicine', compact(
            'inspectionID',
            'patientID',
            'allMedicine',
            'medicines',
            'medicineRepeatDay',
            'medicineDuration',
            'medicineQuantity',
            'medicineDailyAppointment',
            'medicineDetails'
        ));
    }


    //تخزين ادوية المعاينة في قاعدة البيانات

    public function storeMedicineInspection(Request $request)
    {
        $medicineID = $request->input('medicineID');
        $quantity = $request->input('quantity');
        $repetDay = $request->input('repetDay');
        $duration = $request->input('duration');
        $dailyAppointment = $request->input('dailyAppointment');
        $details = $request->input('details');
        $inspectionID = $request->input('inspectionID');
        $patientID = $request->input('patientID');

        MedicineInspectionPatient::create([
            'repeat_day' => $repetDay,
            'duration' => $duration,
            'quantity' => $quantity,
            'daily_appointment' => $dailyAppointment,
            'details' => $details,
            'medicineID' => $medicineID,
            'patientID' => $patientID,
            'inspectionID' => $inspectionID,
        ]);

        return redirect()->back()->with('success_message', 'Medicicne Added Successfully');
    }

    //عرض صفحة اضافة عملية جراحية للمعاينة

    public function surgeriesInspectionCreate(Request $request)
    {
        $inspectionID = $request->input('inspectionID');
        $patientID  = $request->input('patientID');
        $operationRooms = Room::where('type', 'operation')->get();

        return view('Doctor.MedicalRecord.Inspection.createSurgeries', compact('inspectionID', 'patientID', 'operationRooms'));
    }

    //تخزين العملية الجراحية في قاعدة البيانات
    public function surgeriesInspectionStore(Request $request)
    {

        $selectSurgeries = $request->input('selectSurgeries');
        $name = $request->input('name');
        $details = $request->input('details');
        $report = $request->input('report');
        $surgeriesResult = $request->input('surgeriesResult');
        $surgeriesDate = $request->input('surgeriesDate');
        $surgeriesStartTime = $request->input('surgeriesStartTime');
        $surgeriesEndTime = $request->input('surgeriesEndTime');
        $roomID = $request->input('roomID');
        $inspectionID = $request->input('inspectionID');
        $patientID = $request->input('patientID');
        $doctorID = Auth::guard('doctor')->user()->id;

        if ($selectSurgeries == 1) {
            return redirect()->route('doctor.medicalRecord.index')->with('success_message', 'Inspection Created Successfully');
        } else {

            $checkIfRoomNotEmpty = Surgeries::where('roomID', $roomID)
                ->where('surgeriesDate', $surgeriesDate)
                ->where(function ($query) use ($surgeriesStartTime, $surgeriesEndTime) {
                    $query->where(function ($q) use ($surgeriesStartTime, $surgeriesEndTime) {
                        $q->where('surgeriesStartTime', '>=', $surgeriesStartTime)
                            ->where('surgeriesStartTime', '<', $surgeriesEndTime);
                    })->orWhere(function ($q) use ($surgeriesStartTime, $surgeriesEndTime) {
                        $q->where('surgeriesEndTime', '>', $surgeriesStartTime)
                            ->where('surgeriesEndTime', '<=', $surgeriesEndTime);
                    });
                })
                ->exists();

            if ($checkIfRoomNotEmpty) {

                return redirect()->back()->with('error_message', 'Room is not available for the specified time range');
            }

            Surgeries::create([
                'name' => $name,
                'report' => $report,
                'details' => $details,
                'status' => '0',
                'surgeriesResult' => $surgeriesResult,
                'surgeriesDate' => $surgeriesDate,
                'surgeriesStartTime' => $surgeriesStartTime,
                'surgeriesEndTime' => $surgeriesEndTime,
                'roomID' => $roomID,
                'inspectionID' => $inspectionID,
                'patientID' => $patientID,
                'doctorID' => $doctorID,
            ]);

            return redirect()->route('doctor.medicalRecord.index')->with('success_message', 'Inspection Created Successfully');
        }
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

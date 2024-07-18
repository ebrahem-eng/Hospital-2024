<?php

namespace App\Http\Controllers\Doctor\MedicalMachineRequest;

use App\Http\Controllers\Controller;
use App\Models\MedicalMachine;
use App\Models\MedicalMachineRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalMachineRequestController extends Controller
{

    //عرض صفحة جدول طلبات الاجهزة الطبية

    public function index()
    {
        $medicalMachineRequests = MedicalMachineRequest::where('doctorID', Auth::guard('doctor')->user()->id)->get();
        return view('Doctor.MedicalMachineRequest.index', compact('medicalMachineRequests'));
    }

    //عرض صفحة اضافة طلب جهاز طبي 

    public function create()
    {
        $medicalMachines = MedicalMachine::all();
        return view('Doctor.MedicalMachineRequest.create', compact('medicalMachines'));
    }


    //تخزين  طلب جهاز طبي في قاعدة البيانات 

    public function store(Request $request)
    {
        $medicalMachineID = $request->input('medicalMachineID');
        $detailsRequest = $request->input('detailsRequest');
        $medicalMachine = MedicalMachine::findOrfail($medicalMachineID);
        $quantityRequest = $request->input('quantity');
        $medicalMachineOriginalQuantity = $medicalMachine->quantity;
        if($quantityRequest > $medicalMachineOriginalQuantity)
        {
            return redirect()->back()->with('error_message', 'Choose A True Quantity');

        }else {
            MedicalMachineRequest::create([
                'doctorID' => Auth::guard('doctor')->user()->id,
                'status' => '0',
                'medicalMachineID' => $medicalMachineID,
                'detailsRequest' => $detailsRequest,
                'quantity' => $quantityRequest ,
                'takenDate' => $request->input('takenDate'),
                'returnDateDoctor' => $request->input('returnDateDoctor'),
                'statusStoreKeeperReturned' => '0',
            ]);
    
            return redirect()->route('doctor.medicalMachineRequest.index')->with('success_message', 'Medical Machine Request Send Successfully');
        }
   
    }



    //عرض صفحة تعديل بيانات طلب جهاز طبي 

    public function edit($id)
    {
        $medicalMachineRequest = MedicalMachineRequest::findOrfail($id);
        $medicalMachines = MedicalMachine::all();
        return view('Doctor.MedicalMachineRequest.edit', compact('medicalMachineRequest', 'medicalMachines'));
    }

    //تعديل بيانات طلب جهاز طبي داخل قاعدة البيانات 

    public function update(Request $request, $id)
    {

        $medicalMachineRequest = MedicalMachineRequest::findOrFail($id);
        $medicalMachineID = $request->input('medicalMachineID');
        $medicalMachine = MedicalMachine::findOrfail($medicalMachineID);
        $detailsRequest = $request->input('detailsRequest');
        $quantityRequest = $request->input('quantity');
        $medicalMachineOriginalQuantity = $medicalMachine->quantity;
        if($quantityRequest > $medicalMachineOriginalQuantity)
        {
            return redirect()->back()->with('error_message', 'Choose A True Quantity');
        }else{
            $medicalMachineRequest->update([
                'medicalMachineID' => $medicalMachineID,
                'detailsRequest' => $detailsRequest,
                'quantity' => $quantityRequest ,
                'takenDate' => $request->input('takenDate'),
                'returnDateDoctor' => $request->input('returnDateDoctor'),
            ]);
    
            return redirect()->route('doctor.medicalMachineRequest.index')->with('success_message', 'Medical Machine Request Updated Successfully');
        }
     
    }

    //الغاء طلب قبل ارساله للمدير

    public function cancel($id)
    {
        $medicalMachineID = $id;
        $medicalMachineRequest = MedicalMachineRequest::findOrfail($medicalMachineID);
        $medicalMachineRequest->update([
            'status' => '4'
        ]);

        return redirect()->route('doctor.medicalMachineRequest.index')->with('success_message', 'Medical Machine Request Canceled Successfully');
    }
}

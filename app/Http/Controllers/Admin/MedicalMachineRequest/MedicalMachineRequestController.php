<?php

namespace App\Http\Controllers\Admin\MedicalMachineRequest;

use App\Http\Controllers\Controller;
use App\Models\MedicalMachine;
use App\Models\MedicalMachineRequest;
use Illuminate\Http\Request;

class MedicalMachineRequestController extends Controller
{
    //

    //عرض صفحة طلبات الجديدة الاجهزة الطبية

    public function newMedicalMachineRequest()
    {
        $medicalMachineRequests = MedicalMachineRequest::where('status', 1)->get();
        return view('Admin.MedicalMachineRequest.newMediclMachineRequest', compact('medicalMachineRequests'));
    }


    //عرض صفحة سجل طلبات الاجهزة الطبية

    public function historyMedicalMachineRequest()
    {
        $medicalMachineRequests = MedicalMachineRequest::where('status', '!=', 0)->where('status', '!=', 1)->get();
        return view('Admin.MedicalMachineRequest.historyMedicalMachineRequest', compact('medicalMachineRequests'));
    }

    //الموافقة على طلب الجهاز الطبي 

    public function newMedicalMachineRequestAccept($id)
    {

        $medicalMachineRequestID = $id;
        $medicalMachineRequest = MedicalMachineRequest::findOrfail($medicalMachineRequestID);
        $medicalMachineRequestQuantity  = $medicalMachineRequest->quantity;
        $medicalMachineID = $medicalMachineRequest->medicalMachineID;
        $medicalMachine = MedicalMachine::findOrfail($medicalMachineID);

        if ($medicalMachine->quantiy >= $medicalMachineRequestQuantity) {
            $medicalMachine->update([
                'quantity' => $medicalMachineRequestQuantity - $medicalMachine->quantity,
            ]);

            $medicalMachineRequest->update([
                'status' => '2',
                'adminID' => Auth()->guard('admin')->user()->id,
            ]);
            return redirect()->back()->with('success_message', 'Request Accepted Successfully');
        } else if ($medicalMachine->quantiy <= $medicalMachineRequestQuantity) {
            $medicalMachine->update([
                'quantity' => $medicalMachine->quantity - $medicalMachineRequestQuantity,
            ]);

            $medicalMachineRequest->update([
                'status' => '2',
                'adminID' => Auth()->guard('admin')->user()->id,
            ]);
            return redirect()->back()->with('success_message', 'Request Accepted Successfully');
        } else if ($medicalMachine->quantiy == 0) {
            return redirect()->back()->with('error_message', 'Medical Machine Empty');
        }
    }

    //رفض طلب الجهاز الطبي

    public function newMedicalMachineRequestReject(Request $request, $id)
    {

        $medicalMachineRequestID = $id;
        $medicalMachineRequest = MedicalMachineRequest::findOrfail($medicalMachineRequestID);
        $refuseCause = $request->input('refuseCause');

        $medicalMachineRequest->update([
            'status' => '4',
            'refuseCause' => $refuseCause,
            'adminID' => Auth()->guard('admin')->user()->id,
        ]);
        return redirect()->back()->with('success_message', 'Request Rejected Successfully');
    }
}

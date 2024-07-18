<?php

namespace App\Http\Controllers\StoreKeeper\MedicalMachineRequest;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin\Auth\Auth;
use App\Models\MedicalMachineRequest;
use Illuminate\Http\Request;

class MedicalMachineRequestController extends Controller
{
    //

    //عرض صفحة طلبات الجديدة الاجهزة الطبية

    public function newMedicalMachineRequest()
    {
       $medicalMachineRequests = MedicalMachineRequest::where('status' , 0)->get();
        return view('StoreKeeper.MedicalMachineRequest.newMeidcalMachineRequest' , compact('medicalMachineRequests'));
    }


    //عرض صفحة سجل طلبات الاجهزة الطبية

    public function historyMedicalMachineRequest()
    {
        $medicalMachineRequests = MedicalMachineRequest::where('status','!=', 0)->get();
        return view('StoreKeeper.MedicalMachineRequest.historyMeidcalMachineRequest' , compact('medicalMachineRequests'));
    }

    //الموافقة على طلب الجهاز الطبي ورفعه للمدير

    public function newMedicalMachineRequestAccept($id)
    {

        $medicalMachineRequestID = $id;
        $medicalMachineRequest = MedicalMachineRequest::findOrfail($medicalMachineRequestID);
        $medicalMachineRequest->update([
            'status' => '1',
            'storeKeeperID' => Auth()->guard('storeKeeper')->user()->id,
        ]);
        return redirect()->back()->with('success_message' , 'Request Accepted Successfully');
        
    }

    //رفض طلب الجهاز الطبي

    public function newMedicalMachineRequestReject(Request $request , $id)
    {

        $medicalMachineRequestID = $id;
        $medicalMachineRequest = MedicalMachineRequest::findOrfail($medicalMachineRequestID);
        $refuseCause = $request->input('refuseCause');

        $medicalMachineRequest->update([
            'status' => '3',
            'refuseCause' => $refuseCause,
            'storeKeeperID' => Auth()->guard('storeKeeper')->user()->id,
        ]);
        return redirect()->back()->with('success_message' , 'Request Rejected Successfully');

    }

       // اعادة الجهاز الطبي

       public function newMedicalMachineRequestReturn(Request $request , $id)
       {
   
           $medicalMachineRequestID = $id;
           $medicalMachineRequest = MedicalMachineRequest::findOrfail($medicalMachineRequestID);
           $returnDateStoreKeeper = $request->input('returnDateStoreKeeper');
   
           $medicalMachineRequest->update([
               'statusStoreKeeperReturned' => '1',
               'returnDateStoreKeeper' => $returnDateStoreKeeper,
           ]);
           return redirect()->back()->with('success_message' , 'Medical Machien Returned Successfully');
   
       }
}

<?php

namespace App\Http\Controllers\Doctor\AvailableTime;

use App\Http\Controllers\Controller;
use App\Models\DoctorTimeAvailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvailableTimeController extends Controller
{
    //عرض صفحة جدول  اوقات الطبيب المتاحة

    public function index()
    {
        $availableTimes = DoctorTimeAvailable::where('doctorID', Auth::guard('doctor')->user()->id)->get();
        return view('Doctor.AvailableTime.index', compact('availableTimes'));
    }

    //عرض صفحة اضافة وقت طبيب  

    public function create()
    {
        return view('Doctor.AvailableTime.create');
    }


    //تخزين  وقت اتاحة الطبيب في قاعدة البيانات 

    public function store(Request $request)
    {
        $dayName = $request->input('day');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
        $inspectionDuration = $request->input('inspectionDuration');

        $checkDayExisting = DoctorTimeAvailable::where('dayName', $dayName)->first();
        if ($checkDayExisting) {
            return redirect()->back()->with('error_message', 'This Day Already Exists');
        }
        DoctorTimeAvailable::create([
            'doctorID' => Auth::guard('doctor')->user()->id,
            'dayName' => $dayName,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'inspectionDuration' => $inspectionDuration,
        ]);

        return redirect()->route('doctor.availableTime.index')->with('success_message', 'Available Time Added Successfully Successfully');
    }



    //عرض صفحة تعديل بيانات وقت اتاحة طبيب 

    public function edit($id)
    {
        $availableTime = DoctorTimeAvailable::findOrfail($id);
        return view('Doctor.AvailableTime.edit', compact('availableTime'));
    }

    //تعديل بيانات طلب جهاز طبي داخل قاعدة البيانات 

    public function update(Request $request, $id)
    {

        $availableTime = DoctorTimeAvailable::findOrfail($id);
        $dayName = $request->input('day');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
        $inspectionDuration = $request->input('inspectionDuration');

        $availableTime->update([
            'dayName' => $dayName,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'inspectionDuration' => $inspectionDuration,
        ]);

        return redirect()->route('doctor.availableTime.index')->with('success_message', 'Available Time Updated Successfully Successfully');
    }


    //حذف الوقت المتاح

    public function delete($id)
    {
        $availableTime = DoctorTimeAvailable::findOrfail($id);
        $availableTime->forceDelete();
        return redirect()->route('doctor.availableTime.index')->with('success_message', 'Available Time Deleted Successfully Successfully');
    }
}

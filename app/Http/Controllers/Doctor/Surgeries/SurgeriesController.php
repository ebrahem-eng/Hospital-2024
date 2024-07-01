<?php

namespace App\Http\Controllers\Doctor\Surgeries;

use App\Http\Controllers\Controller;
use App\Models\Surgeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurgeriesController extends Controller
{
      //عرض صفحة جدول العمليات الطبية

      public function index()
      {
          $surgerieses = Surgeries::where('doctorID', Auth::guard('doctor')->user()->id)->get();
          return view('Doctor.Surgeries.index', compact('surgerieses'));
      }
  
     //انهاء العملية الجراحية
  
      public function finish($id)
      {
          $surgeriesID = $id;
          $surgeries = Surgeries::findOrFail($surgeriesID);

          $surgeries->update([
            'status' => '1'
          ]);

          return redirect()->back()->with('success_message' , 'Surgeries Finished Successfully');
      }

      //الغاء العملية الجراحية

      public function cancel($id)
      {
        $surgeriesID = $id;
        $surgeries = Surgeries::findOrFail($surgeriesID);

        $surgeries->update([
          'status' => '2'
        ]);

        return redirect()->back()->with('success_message' , 'Surgeries Canceled Successfully');
      }


       //عرض صفحة جدول العمليات الطبية المنتهية

       public function finished()
       {
           $doctorID = Auth::guard('doctor')->user()->id;
           $surgerieses = Surgeries::where('doctorID', $doctorID)->where('status' , '1')->get();
           return view('Doctor.Surgeries.finishedSurgeries', compact('surgerieses'));
       }


       //عرض صفحة تعديل نتائج العملية

       public function edit($id)
       {
        $surgeries = Surgeries::findOrFail($id);
        return view('Doctor.Surgeries.edit', compact('surgeries'));
       }

       //تعديل نتائج العملية في قاعدة البيانات
       public function update(Request $request , $id)
       {
        $surgeries = Surgeries::findOrFail($id);

        $surgeries->update([
            'name' => $request->input('name'),
            'report' => $request->input('report'),
            'details' => $request->input('details'),
            'surgeriesResult' => $request->input('surgeriesResult')
        ]);
        return redirect()->route('doctor.surgeries.finished')->with('success_message' , 'Surgeries Updated Successfully');
       }



}

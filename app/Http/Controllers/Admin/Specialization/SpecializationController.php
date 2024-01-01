<?php

namespace App\Http\Controllers\Admin\Specialization;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpecializationController extends Controller
{
    //عرض صفحة جدول الاختصاصات

    public function index()
    {
        $specializations = Specialization::all();
        return view('Admin.Specialization.index', compact('specializations'));
    }

    //عرض صفحة اضافة اختصاص جديد 

    public function create()
    {
        return view('Admin.Specialization.create');
    }

    //تخزين الاختصاصات في قاعدة البيانات 

    public function store(Request $request)
    {

        Specialization::create([
            'name' => $request->input('name'),
            'created_by' => Auth::guard('admin')->user()->id,
        ]);

        return redirect()->route('admin.specialization.index')->with('success_message', 'Specialization Created Successfully');
    }

    //عرض صفحة تعديل بيانات اختصاص 

    public function edit($id)
    {
        $specialization = Specialization::findOrfail($id);
        return view('Admin.Specialization.edit', compact('specialization'));
    }

    //تعديل بيانات اختصاص داخل قاعدة البيانات 

    public function update(Request $request, $id)
    {

        $specialization = Specialization::findOrFail($id);

        $specialization->update([
            'name' => $request->input('name'),

        ]);

        return redirect()->route('admin.specialization.index')->with('success_message', 'Specialization Updated Successfully');
    }

        //عرض صفحة جدول الاختصاصات المحذوفين

        public function archive()
        {
            $specializations = Specialization::onlyTrashed()->get();
            return view('Admin.Specialization.archive', compact('specializations'));
        }
    
        //حذف اختصاص ونقله للارشيف 
    
        public function softDelete($id)
        {
            $specialization = Specialization::findOrFail($id);
    
            $specialization->delete();
    
            return redirect()->route('admin.specialization.index')->with('success_message', 'Specialization Deleted Successfully');
        }
    
          //حذف اختصاص بشكل نهائي
    
          public function forceDelete($id)
          {
              $specialization = Specialization::withTrashed()->where('id', $id)->first();
              if ($specialization) {
                  $specialization->forceDelete();
      
                  return redirect()->route('admin.specialization.archive')->with('success_message', 'Specialization Deleted Successfully');
              } else {
                  return redirect()->back()->with('error_message', 'Specialization Not Found');
              }
          }
    
        //استعادة اختصاص المحذوف من الارشيف
    
        public function restore($id)
        {
            Specialization::withTrashed()->where('id', $id)->restore();
    
            return redirect()->route('admin.specialization.archive')->with('success_message', 'Specialization Restored Successfully');
        }
    
}

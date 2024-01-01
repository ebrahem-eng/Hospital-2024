<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    //عرض صفحة جدول الاطباء

    public function index()
    {
        $doctors = Doctor::all();
        return view('Admin.Doctor.index', compact('doctors'));
    }

    //عرض صفحة اضافة دكتور جديد 

    public function create()
    {
        $specializations = Specialization::all();
        return view('Admin.Doctor.create', compact('specializations'));
    }

    //تخزين الاطباء في قاعدة البيانات 

    public function store(Request $request)
    {
        $password = $request->input('password');
        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('DoctorImage', $image, 'image');

        Doctor::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($password),
            'phone' => $request->input('phone'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'status' => $request->input('status'),
            'specialization_id' => $request->input('specializationID'),
            'img' => $path,
            'created_by' => Auth::guard('admin')->user()->id,
        ]);

        return redirect()->route('admin.doctor.index')->with('success_message', 'Doctor Created Successfully');
    }

    //عرض صفحة تعديل بيانات طبيب 

    public function edit($id)
    {
        $doctor = Doctor::findOrfail($id);
        $specializations = Specialization::all();
        return view('Admin.Doctor.edit', compact('doctor', 'specializations'));
    }

    //تعديل بيانات الطبيب داخل قاعدة البيانات 

    public function update(Request $request, $id)
    {

        $doctor = Doctor::findOrFail($id);

        if ($request->file('img') == null) {
            $doctor->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'age' => $request->input('age'),
                'gender' => $request->input('gender'),
                'status' => $request->input('status'),
                'specialization_id' => $request->input('specializationID'),
            ]);

            return redirect()->route('admin.doctor.index')->with('success_message', 'Doctor Updated Successfully');
        } else {
            if ($doctor->img != null) {
                Storage::disk('image')->delete($doctor->img);
                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('DoctorImage', $image, 'image');

                $doctor->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'age' => $request->input('age'),
                    'gender' => $request->input('gender'),
                    'status' => $request->input('status'),
                    'specialization_id' => $request->input('specializationID'),
                    'img' => $path,
                ]);

                return redirect()->route('admin.doctor.index')->with('success_message', 'Doctor Updated Successfully');
            } else {

                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('DoctorImage', $image, 'image');

                $doctor->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'age' => $request->input('age'),
                    'gender' => $request->input('gender'),
                    'status' => $request->input('status'),
                    'specialization_id' => $request->input('specializationID'),
                    'img' => $path,
                ]);



                return redirect()->route('admin.doctor.index')->with('success_message', 'Doctor Updated Successfully');
            }
        }
    }

    //عرض صفحة جدول الاطباء المحذوفين

    public function archive()
    {
        $doctors = Doctor::onlyTrashed()->get();
        return view('Admin.Doctor.archive', compact('doctors'));
    }

    //حذف الطبيب ونقله للارشيف 

    public function softDelete($id)
    {
        $doctor = Doctor::findOrFail($id);

        $doctor->delete();

        return redirect()->route('admin.doctor.index')->with('success_message', 'Doctor Deleted Successfully');
    }

      //حذف الطبيب بشكل نهائي

      public function forceDelete($id)
      {
          $doctor = Doctor::withTrashed()->where('id', $id)->first();
          if ($doctor) {
              Storage::disk('image')->delete($doctor->img);
              $doctor->forceDelete();
  
              return redirect()->route('admin.doctor.archive')->with('success_message', 'Doctor Deleted Successfully');
          } else {
              return redirect()->back()->with('error_message', 'Doctor Not Found');
          }
      }

    //استعادة الطبيب المحذوف من الارشيف

    public function restore($id)
    {
        Doctor::withTrashed()->where('id', $id)->restore();

        return redirect()->route('admin.doctor.archive')->with('success_message', 'Doctor Restored Successfully');
    }

  
}

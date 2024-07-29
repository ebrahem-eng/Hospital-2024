<?php

namespace App\Http\Controllers\Reception\Patient;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin\Auth\Auth;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    //
    public function index()
    {
        $patients = Patient::all();
        return view('Reception.Patient.index', compact('patients'));
    }

    //عرض صفحة اضافة مريض جديد 

    public function create()
    {
        return view('Reception.Patient.create');
    }

    //تخزين المرضى في قاعدة البيانات 

    public function store(Request $request)
    {
        $password = $request->input('password');
        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('PatientImage', $image, 'image');

        Patient::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($password),
            'phone' => $request->input('phone'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'status' => $request->input('status'),
            'img' => $path,
            'created_by' => FacadesAuth::guard('reception')->user()->id,
        ]);

        return redirect()->route('reception.patient.index')->with('success_message', 'Patient Created Successfully');
    }

    //عرض صفحة تعديل بيانات مريض 

    public function edit($id)
    {
        $patient = Patient::findOrfail($id);
        return view('Reception.Patient.edit', compact('patient'));
    }

    //تعديل بيانات مريض داخل قاعدة البيانات 

    public function update(Request $request, $id)
    {

        $patient = Patient::findOrFail($id);

        if ($request->file('img') == null) {
            $patient->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'age' => $request->input('age'),
                'gender' => $request->input('gender'),
                'status' => $request->input('status'),
            ]);

            return redirect()->route('reception.patient.index')->with('success_message', 'Patient Updated Successfully');
        } else {
            if ($patient->img != null) {
                Storage::disk('image')->delete($patient->img);
                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('PatientImage', $image, 'image');

                $patient->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'age' => $request->input('age'),
                    'gender' => $request->input('gender'),
                    'status' => $request->input('status'),
                    'img' => $path,
                ]);

                return redirect()->route('reception.patient.index')->with('success_message', 'Patient Updated Successfully');
            } else {

                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('PatientImage', $image, 'image');

                $patient->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'age' => $request->input('age'),
                    'gender' => $request->input('gender'),
                    'status' => $request->input('status'),
                    'img' => $path,
                ]);


                return redirect()->route('reception.patient.index')->with('success_message', 'Patient Updated Successfully');
            }
        }
    }

    //عرض صفحة جدول المرضى المحذوفين

    public function archive()
    {
        $patients = Patient::onlyTrashed()->get();
        return view('Reception.Patient.archive', compact('patients'));
    }

    //حذف مريض ونقله للارشيف 

    public function delete($id)
    {
        $patient = Patient::findOrFail($id);

        $patient->delete();

        return redirect()->route('reception.patient.index')->with('success_message', 'Patient Deleted Successfully');
    }

    //حذف مريض بشكل نهائي

    public function forceDelete($id)
    {

        $patient = Patient::withTrashed()->find($id);

        if (!$patient) {

            return redirect()->back()->with('error_message', 'Patient Not Found');
        }

        try {

            if (Storage::disk('image')->exists($patient->img)) {

                Storage::disk('image')->delete($patient->img);
            } else {

                return redirect()->back()->with('error_message', 'Image Not Found');
            }


            $patient->forceDelete();


            return redirect()->route('reception.patient.archive')->with('success_message', 'Patient Deleted Successfully');
        } catch (\Exception $e) {

            return redirect()->back()->with('error_message', 'An error occurred while deleting the patient');
        }
    }

    //استعادة مريض من الارشيف

    public function restore($id)
    {
        Patient::withTrashed()->where('id', $id)->restore();

        return redirect()->route('reception.patient.archive')->with('success_message', 'Patient Restored Successfully');
    }
}

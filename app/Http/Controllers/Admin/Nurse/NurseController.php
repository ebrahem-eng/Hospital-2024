<?php

namespace App\Http\Controllers\Admin\Nurse;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Nurse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class NurseController extends Controller
{

    //عرض صفحة جدول الممرضين

    public function index()
    {
        $nurses = Nurse::all();
        return view('Admin.Nurse.index', compact('nurses'));
    }

    //عرض صفحة اضافة  ممرض جديد 

    public function create()
    {
        $departments = Department::all();
        return view('Admin.Nurse.create', compact('departments'));
    }

    //تخزين الممرضين في قاعدة البيانات 

    public function store(Request $request)
    {
        $password = $request->input('password');
        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('NurseImage', $image, 'image');

        Nurse::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($password),
            'phone' => $request->input('phone'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'status' => $request->input('status'),
            'department_id' => $request->input('departmentID'),
            'img' => $path,
            'created_by' => Auth::guard('admin')->user()->id,
        ]);

        return redirect()->route('admin.nurse.index')->with('success_message', 'Nurse Created Successfully');
    }

    //عرض صفحة تعديل بيانات ممرض

    public function edit($id)
    {
        $nurse = Nurse::findOrfail($id);
        $departments = Department::all();
        return view('Admin.Nurse.edit', compact('nurse', 'departments'));
    }

    //تعديل بيانات ممرض داخل قاعدة البيانات 

    public function update(Request $request, $id)
    {

        $nurse = Nurse::findOrFail($id);

        if ($request->file('img') == null) {
            $nurse->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'age' => $request->input('age'),
                'gender' => $request->input('gender'),
                'status' => $request->input('status'),
                'department_id' => $request->input('departmentID'),
            ]);

            return redirect()->route('admin.nurse.index')->with('success_message', 'Nurse Updated Successfully');
        } else {
            if ($nurse->img != null) {
                Storage::disk('image')->delete($nurse->img);
                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('NurseImage', $image, 'image');

                $nurse->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'age' => $request->input('age'),
                    'gender' => $request->input('gender'),
                    'status' => $request->input('status'),
                    'department_id' => $request->input('departmentID'),
                    'img' => $path,
                ]);

                return redirect()->route('admin.nurse.index')->with('success_message', 'Nurse Updated Successfully');
            } else {

                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('NurseImage', $image, 'image');

                $nurse->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'age' => $request->input('age'),
                    'gender' => $request->input('gender'),
                    'status' => $request->input('status'),
                    'department_id' => $request->input('departmentID'),
                    'img' => $path,
                ]);

                return redirect()->route('admin.nurse.index')->with('success_message', 'Nurse Updated Successfully');
            }
        }
    }

    //عرض صفحة جدول الممرضين المحذوفين

    public function archive()
    {
        $nurses = Nurse::onlyTrashed()->get();
        return view('Admin.Nurse.archive', compact('nurses'));
    }

    //حذف ممرض ونقله للارشيف 

    public function softDelete($id)
    {
        $nurse = Nurse::findOrFail($id);

        $nurse->delete();

        return redirect()->route('admin.nurse.index')->with('success_message', 'Nurse Deleted Successfully');
    }

    //حذف ممرض بشكل نهائي

    public function forceDelete($id)
    {
        $nurse = Nurse::withTrashed()->where('id', $id)->first();
        if ($nurse) {
            Storage::disk('image')->delete($nurse->img);
            $nurse->forceDelete();

            return redirect()->route('admin.nurse.archive')->with('success_message', 'Nurse Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'Nurse Not Found');
        }
    }

    //استعادة ممرض المحذوف من الارشيف

    public function restore($id)
    {
        Nurse::withTrashed()->where('id', $id)->restore();

        return redirect()->route('admin.nurse.archive')->with('success_message', 'Nurse Restored Successfully');
    }
}

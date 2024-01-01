<?php

namespace App\Http\Controllers\Admin\DepartmentEmploye;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentEmploye;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DepartmentEmployeController extends Controller
{

    //عرض صفحة جدول موظفين الاقسام

    public function index()
    {
        $departmentEmployes = DepartmentEmploye::all();
        return view('Admin.DepartmentEmploye.index', compact('departmentEmployes'));
    }

    //عرض صفحة اضافة موظف قسم جديد 

    public function create()
    {
        $departments = Department::all();
        return view('Admin.DepartmentEmploye.create', compact('departments'));
    }

    //تخزين موظفين الاقسام في قاعدة البيانات 

    public function store(Request $request)
    {
        $password = $request->input('password');
        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('DepartmentEmployeImage', $image, 'image');

        DepartmentEmploye::create([
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

        return redirect()->route('admin.departmentEmploye.index')->with('success_message', 'DepartmentEmploye Created Successfully');
    }

    //عرض صفحة تعديل بيانات موظف قسم 

    public function edit($id)
    {
        $departmentEmploye = DepartmentEmploye::findOrfail($id);
        $departments = Department::all();
        return view('Admin.DepartmentEmploye.edit', compact('departmentEmploye', 'departments'));
    }

    //تعديل بيانات موظف قسم داخل قاعدة البيانات 

    public function update(Request $request, $id)
    {

        $departmentEmploye = DepartmentEmploye::findOrFail($id);

        if ($request->file('img') == null) {
            $departmentEmploye->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'age' => $request->input('age'),
                'gender' => $request->input('gender'),
                'status' => $request->input('status'),
                'department_id' => $request->input('departmentID'),
            ]);

            return redirect()->route('admin.departmentEmploye.index')->with('success_message', 'Department Employe Updated Successfully');
        } else {
            if ($departmentEmploye->img != null) {
                Storage::disk('image')->delete($departmentEmploye->img);
                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('DepartmentEmployeImage', $image, 'image');

                $departmentEmploye->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'age' => $request->input('age'),
                    'gender' => $request->input('gender'),
                    'status' => $request->input('status'),
                    'department_id' => $request->input('departmentID'),
                    'img' => $path,
                ]);

                return redirect()->route('admin.departmentEmploye.index')->with('success_message', 'Department Employe Updated Successfully');
            } else {

                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('DepartmentEmployeImage', $image, 'image');

                $departmentEmploye->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'age' => $request->input('age'),
                    'gender' => $request->input('gender'),
                    'status' => $request->input('status'),
                    'department_id' => $request->input('departmentID'),
                    'img' => $path,
                ]);

                return redirect()->route('admin.departmentEmploye.index')->with('success_message', 'Department Employe Updated Successfully');
            }
        }
    }

    //عرض صفحة جدول موظفين الاقسام المحذوفين

    public function archive()
    {
        $departmentEmployes = DepartmentEmploye::onlyTrashed()->get();
        return view('Admin.DepartmentEmploye.archive', compact('departmentEmployes'));
    }

    //حذف  موظف قسم ونقله للارشيف 

    public function softDelete($id)
    {
        $departmentEmploye = DepartmentEmploye::findOrFail($id);

        $departmentEmploye->delete();

        return redirect()->route('admin.departmentEmploye.index')->with('success_message', 'Department Employe Deleted Successfully');
    }

    //حذف موظف قسم بشكل نهائي

    public function forceDelete($id)
    {
        $departmentEmploye = DepartmentEmploye::withTrashed()->where('id', $id)->first();
        if ($departmentEmploye) {
            Storage::disk('image')->delete($departmentEmploye->img);
            $departmentEmploye->forceDelete();

            return redirect()->route('admin.departmentEmploye.archive')->with('success_message', 'Department Employe Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'Department Employe Not Found');
        }
    }

    //استعادة  موظف قسم المحذوف من الارشيف

    public function restore($id)
    {
        DepartmentEmploye::withTrashed()->where('id', $id)->restore();

        return redirect()->route('admin.departmentEmploye.archive')->with('success_message', 'Department Employe Restored Successfully');
    }
}

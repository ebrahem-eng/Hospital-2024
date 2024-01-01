<?php

namespace App\Http\Controllers\Admin\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    //عرض صفحة جدول الاقسام

    public function index()
    {
        $departments = Department::all();
        return view('Admin.Department.index', compact('departments'));
    }

    //عرض صفحة اضافة قسم جديد 

    public function create()
    {
        return view('Admin.Department.create');
    }

    //تخزين الاقسام في قاعدة البيانات 

    public function store(Request $request)
    {

        Department::create([
            'name' => $request->input('name'),
            'created_by' => Auth::guard('admin')->user()->id,
        ]);

        return redirect()->route('admin.department.index')->with('success_message', 'Department Created Successfully');
    }

    //عرض صفحة تعديل بيانات قسم 

    public function edit($id)
    {
        $department = Department::findOrfail($id);
        return view('Admin.Department.edit', compact('department'));
    }

    //تعديل بيانات قسم داخل قاعدة البيانات 

    public function update(Request $request, $id)
    {

        $department = Department::findOrFail($id);

        $department->update([
            'name' => $request->input('name'),

        ]);

        return redirect()->route('admin.department.index')->with('success_message', 'Department Updated Successfully');
    }

    //عرض صفحة جدول الاقسام المحذوفين

    public function archive()
    {
        $departments = Department::onlyTrashed()->get();
        return view('Admin.Department.archive', compact('departments'));
    }

    //حذف قسم ونقله للارشيف 

    public function softDelete($id)
    {
        $department = Department::findOrFail($id);

        $department->delete();

        return redirect()->route('admin.department.index')->with('success_message', 'Department Deleted Successfully');
    }

    //حذف قسم بشكل نهائي

    public function forceDelete($id)
    {
        $department = Department::withTrashed()->where('id', $id)->first();
        if ($department) {
            $department->forceDelete();

            return redirect()->route('admin.department.archive')->with('success_message', 'Department Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'Department Not Found');
        }
    }

    //استعادة قسم المحذوف من الارشيف

    public function restore($id)
    {
        Department::withTrashed()->where('id', $id)->restore();

        return redirect()->route('admin.department.archive')->with('success_message', 'Department Restored Successfully');
    }
}

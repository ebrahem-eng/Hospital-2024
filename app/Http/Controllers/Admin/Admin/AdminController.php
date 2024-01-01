<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    //عرض صفحة جدول المسؤولين

    public function index()
    {
        $admins = Admin::all();
        return view('Admin.Admin.index', compact('admins'));
    }

    //عرض صفحة اضافة مسؤول جديد 

    public function create()
    {
        return view('Admin.Admin.create');
    }

    //تخزين المسؤولين في قاعدة البيانات 

    public function store(Request $request)
    {
        $password = $request->input('password');
        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('AdminImage', $image, 'image');

        Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($password),
            'phone' => $request->input('phone'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'status' => $request->input('status'),
            'img' => $path,
            'created_by' => Auth::guard('admin')->user()->id,
        ]);

        return redirect()->route('admin.admin.index')->with('success_message', 'Admin Created Successfully');
    }

    //عرض صفحة تعديل بيانات مسؤول 

    public function edit($id)
    {
        $admin = Admin::findOrfail($id);
        return view('Admin.Admin.edit', compact('admin'));
    }

    //تعديل بيانات مسؤول داخل قاعدة البيانات 

    public function update(Request $request, $id)
    {

        $admin = Admin::findOrFail($id);

        if ($request->file('img') == null) {
            $admin->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'age' => $request->input('age'),
                'gender' => $request->input('gender'),
                'status' => $request->input('status'),
            ]);

            return redirect()->route('admin.admin.index')->with('success_message', 'Admin Updated Successfully');
        } else {
            if ($admin->img != null) {
                Storage::disk('image')->delete($admin->img);
                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('AdminImage', $image, 'image');

                $admin->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'age' => $request->input('age'),
                    'gender' => $request->input('gender'),
                    'status' => $request->input('status'),
                    'img' => $path,
                ]);

                return redirect()->route('admin.admin.index')->with('success_message', 'Admin Updated Successfully');
            } else {

                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('AdminImage', $image, 'image');

                $admin->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'age' => $request->input('age'),
                    'gender' => $request->input('gender'),
                    'status' => $request->input('status'),
                    'img' => $path,
                ]);

                return redirect()->route('admin.admin.index')->with('success_message', 'Admin Updated Successfully');
            }
        }
    }

    //عرض صفحة جدول المسؤولين المحذوفين

    public function archive()
    {
        $admins = Admin::onlyTrashed()->get();
        return view('Admin.Admin.archive', compact('admins'));
    }

    //حذف مسؤول ونقله للارشيف 

    public function softDelete($id)
    {
        $admin = Admin::findOrFail($id);

        $admin->delete();

        return redirect()->route('admin.admin.index')->with('success_message', 'Admin Deleted Successfully');
    }

    //حذف مسؤول بشكل نهائي

    public function forceDelete($id)
    {
        $admin = Admin::withTrashed()->where('id', $id)->first();
        if ($admin) {
            Storage::disk('image')->delete($admin->img);
            $admin->forceDelete();

            return redirect()->route('admin.admin.archive')->with('success_message', 'Admin Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'Doctor Not Found');
        }
    }

    //استعادة مسؤول المحذوف من الارشيف

    public function restore($id)
    {
        Admin::withTrashed()->where('id', $id)->restore();

        return redirect()->route('admin.admin.archive')->with('success_message', 'Admin Restored Successfully');
    }
}

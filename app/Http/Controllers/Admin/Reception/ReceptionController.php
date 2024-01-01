<?php

namespace App\Http\Controllers\Admin\Reception;

use App\Http\Controllers\Controller;
use App\Models\Reception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ReceptionController extends Controller
{

    //عرض صفحة جدول موظفين الاستقبال 

    public function index()
    {
        $receptions = Reception::all();
        return view('Admin.Reception.index', compact('receptions'));
    }

    //عرض صفحة اضافة موظف استقبال جديد 

    public function create()
    {
        return view('Admin.Reception.create');
    }

    //تخزين  موظفين الاستقبال في قاعدة البيانات 

    public function store(Request $request)
    {
        $password = $request->input('password');
        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('ReceptionImage', $image, 'image');

        Reception::create([
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

        return redirect()->route('admin.reception.index')->with('success_message', 'Reception Created Successfully');
    }

    //عرض صفحة تعديل بيانات موظف استقبال 

    public function edit($id)
    {
        $reception = Reception::findOrfail($id);
        return view('Admin.Reception.edit', compact('reception'));
    }

    //تعديل بيانات موظف استقبال داخل قاعدة البيانات 

    public function update(Request $request, $id)
    {

        $reception = Reception::findOrFail($id);

        if ($request->file('img') == null) {
            $reception->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'age' => $request->input('age'),
                'gender' => $request->input('gender'),
                'status' => $request->input('status'),
            ]);

            return redirect()->route('admin.reception.index')->with('success_message', 'Reception Updated Successfully');
        } else {
            if ($reception->img != null) {
                Storage::disk('image')->delete($reception->img);
                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('ReceptionImage', $image, 'image');

                $reception->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'age' => $request->input('age'),
                    'gender' => $request->input('gender'),
                    'status' => $request->input('status'),
                    'img' => $path,
                ]);

                return redirect()->route('admin.reception.index')->with('success_message', 'Reception Updated Successfully');
            } else {

                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('ReceptionImage', $image, 'image');

                $reception->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'age' => $request->input('age'),
                    'gender' => $request->input('gender'),
                    'status' => $request->input('status'),
                    'img' => $path,
                ]);
                return redirect()->route('admin.reception.index')->with('success_message', 'Reception Updated Successfully');
            }
        }
    }

    //عرض صفحة جدول موظفين الاستقبال المحذوفين

    public function archive()
    {
        $receptions = Reception::onlyTrashed()->get();
        return view('Admin.Reception.archive', compact('receptions'));
    }

    //حذف موظف استقبال ونقله للارشيف 

    public function softDelete($id)
    {
        $reception = Reception::findOrFail($id);

        $reception->delete();

        return redirect()->route('admin.reception.index')->with('success_message', 'Reception Deleted Successfully');
    }

    //حذف موظف استقبال بشكل نهائي

    public function forceDelete($id)
    {
        $reception = Reception::withTrashed()->where('id', $id)->first();
        if ($reception) {
            Storage::disk('image')->delete($reception->img);
            $reception->forceDelete();

            return redirect()->route('admin.reception.archive')->with('success_message', 'Reception Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'Reception Not Found');
        }
    }

    //استعادة الطبيب المحذوف من الارشيف

    public function restore($id)
    {
        Reception::withTrashed()->where('id', $id)->restore();

        return redirect()->route('admin.reception.archive')->with('success_message', 'Reception Restored Successfully');
    }
}

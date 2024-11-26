<?php

namespace App\Http\Controllers\Admin\Laboratory;

use App\Http\Controllers\Controller;
use App\Models\Laboratory;
use App\Models\StoreKeeper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LaboratoryController extends Controller
{
    //
    //عرض صفحة جدول المخابر

    public function index()
    {
        $laboratories = Laboratory::all();
        return view('Admin.Laboratory.index', compact('laboratories'));
    }

    //عرض صفحة اضافة مخبر جديد

    public function create()
    {
        return view('Admin.Laboratory.create');
    }

    //تخزين المخابر في قاعدة البيانات

    public function store(Request $request)
    {
        $password = $request->input('password');
        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('LaboratoryImage', $image, 'image');

        Laboratory::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($password),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
            'img' => $path,
            'created_by' => Auth::guard('admin')->user()->id,
        ]);

        return redirect()->route('admin.laboratory.index')->with('success_message', 'Laboratory Created Successfully');
    }

    //عرض صفحة تعديل بيانات مخبر

    public function edit($id)
    {
        $laboratory = Laboratory::findOrfail($id);
        return view('Admin.Laboratory.edit', compact('laboratory'));
    }

    //تعديل بيانات مخبر داخل قاعدة البيانات

    public function update(Request $request, $id)
    {

        $laboratory = Laboratory::findOrFail($id);

        if ($request->file('img') == null) {
            $laboratory->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'status' => $request->input('status'),
            ]);

            return redirect()->route('admin.laboratory.index')->with('success_message', 'Laboratory Updated Successfully');
        } else {
            if ($laboratory->img != null) {
                Storage::disk('image')->delete($laboratory->img);
                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('StoreKeeperImage', $image, 'image');

                $laboratory->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'status' => $request->input('status'),
                    'img' => $path,
                ]);

                return redirect()->route('admin.laboratory.index')->with('success_message', 'Laboratory Updated Successfully');
            } else {

                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('StoreKeeperImage', $image, 'image');

                $laboratory->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'status' => $request->input('status'),
                    'img' => $path,
                ]);
                return redirect()->route('admin.laboratory.index')->with('success_message', 'Laboratory Updated Successfully');
            }
        }
    }

    //عرض صفحة جدول المخابر المحذوفين

    public function archive()
    {
        $laboratories = Laboratory::onlyTrashed()->get();
        return view('Admin.Laboratory.archive', compact('laboratories'));
    }

    //حذف المخبر ونقله للارشيف

    public function softDelete($id)
    {
        $laboratory = Laboratory::findOrFail($id);

        $laboratory->delete();

        return redirect()->route('admin.laboratory.index')->with('success_message', 'Laboratory Deleted Successfully');
    }

    //حذف مخبر بشكل نهائي

    public function forceDelete($id)
    {
        $laboratory = Laboratory::withTrashed()->where('id', $id)->first();
        if ($laboratory) {
            Storage::disk('image')->delete($laboratory->img);
            $laboratory->forceDelete();

            return redirect()->route('admin.laboratory.archive')->with('success_message', 'Laboratory Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'Laboratory Not Found');
        }
    }

    //استعادة المخبر المحذوف من الارشيف

    public function restore($id)
    {
        Laboratory::withTrashed()->where('id', $id)->restore();

        return redirect()->route('admin.laboratory.archive')->with('success_message', 'Laboratory Restored Successfully');
    }
}

<?php

namespace App\Http\Controllers\Admin\StoreKeeper;

use App\Http\Controllers\Controller;
use App\Models\StoreKeeper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StoreKeeperController extends Controller
{

    //عرض صفحة جدول امناء المستودع 

    public function index()
    {
        $storeKeepers = StoreKeeper::all();
        return view('Admin.StoreKeeper.index', compact('storeKeepers'));
    }

    //عرض صفحة اضافة امين مستودع جديد 

    public function create()
    {
        return view('Admin.StoreKeeper.create');
    }

    //تخزين امناء المستودع في قاعدة البيانات 

    public function store(Request $request)
    {
        $password = $request->input('password');
        $image = $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('StoreKeeperImage', $image, 'image');

        StoreKeeper::create([
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

        return redirect()->route('admin.storeKeeper.index')->with('success_message', 'StoreKeeper Created Successfully');
    }

    //عرض صفحة تعديل بيانات امين مستودع 

    public function edit($id)
    {
        $storeKeeper = StoreKeeper::findOrfail($id);
        return view('Admin.StoreKeeper.edit', compact('storeKeeper'));
    }

    //تعديل بيانات امين مستودع داخل قاعدة البيانات 

    public function update(Request $request, $id)
    {

        $storeKeeper = StoreKeeper::findOrFail($id);

        if ($request->file('img') == null) {
            $storeKeeper->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'age' => $request->input('age'),
                'gender' => $request->input('gender'),
                'status' => $request->input('status'),
            ]);

            return redirect()->route('admin.storeKeeper.index')->with('success_message', 'StoreKeeper Updated Successfully');
        } else {
            if ($storeKeeper->img != null) {
                Storage::disk('image')->delete($storeKeeper->img);
                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('StoreKeeperImage', $image, 'image');

                $storeKeeper->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'age' => $request->input('age'),
                    'gender' => $request->input('gender'),
                    'status' => $request->input('status'),
                    'img' => $path,
                ]);

                return redirect()->route('admin.storeKeeper.index')->with('success_message', 'StoreKeeper Updated Successfully');
            } else {

                $image = $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('StoreKeeperImage', $image, 'image');

                $storeKeeper->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'age' => $request->input('age'),
                    'gender' => $request->input('gender'),
                    'status' => $request->input('status'),
                    'img' => $path,
                ]);
                return redirect()->route('admin.storeKeeper.index')->with('success_message', 'StoreKeeper Updated Successfully');
            }
        }
    }

    //عرض صفحة جدول امناء المستودع المحذوفين

    public function archive()
    {
        $storeKeepers = StoreKeeper::onlyTrashed()->get();
        return view('Admin.StoreKeeper.archive', compact('storeKeepers'));
    }

    //حذف امين مستودع ونقله للارشيف 

    public function softDelete($id)
    {
        $storeKeeper = StoreKeeper::findOrFail($id);

        $storeKeeper->delete();

        return redirect()->route('admin.storeKeeper.index')->with('success_message', 'StoreKeeper Deleted Successfully');
    }

    //حذف موظف استقبال بشكل نهائي

    public function forceDelete($id)
    {
        $storeKeeper = StoreKeeper::withTrashed()->where('id', $id)->first();
        if ($storeKeeper) {
            Storage::disk('image')->delete($storeKeeper->img);
            $storeKeeper->forceDelete();

            return redirect()->route('admin.storeKeeper.archive')->with('success_message', 'StoreKeeper Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'StoreKeeper Not Found');
        }
    }

    //استعادة الطبيب المحذوف من الارشيف

    public function restore($id)
    {
        StoreKeeper::withTrashed()->where('id', $id)->restore();

        return redirect()->route('admin.storeKeeper.archive')->with('success_message', 'StoreKeeper Restored Successfully');
    }
}

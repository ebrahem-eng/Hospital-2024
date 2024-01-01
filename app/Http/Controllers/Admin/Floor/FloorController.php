<?php

namespace App\Http\Controllers\Admin\Floor;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{

    //عرض صفحة جدول الطوابق

    public function index()
    {
        $floors = Floor::all();
        return view('Admin.Floor.index', compact('floors'));
    }

    //عرض صفحة اضافة طابق جديد

    public function create()
    {

        return view('Admin.Floor.create');
    }

    //تخزين الطوابق في قاعدة البيانات 

    public function store(Request $request)
    {

        Floor::create([
            'name' => $request->input('name'),
            'number' => $request->input('number'),
        ]);

        return redirect()->route('admin.floor.index')->with('success_message', 'Floor Created Successfully');
    }


    //عرض صفحة تعديل بيانات طابق

    public function edit($id)
    {
        $floor = Floor::findOrfail($id);
        return view('Admin.Floor.edit', compact('floor'));
    }

    //تعديل بيانات طابق داخل قاعدة البيانات 

    public function update(Request $request, $id)
    {

        $floor = Floor::findOrFail($id);

        $floor->update([
            'name' => $request->input('name'),
            'number' => $request->input('number'),
        ]);

        return redirect()->route('admin.floor.index')->with('success_message', 'Floor Updated Successfully');
    }


    //عرض صفحة جدول الطوابق المحذوفين

    public function archive()
    {
        $floors = Floor::onlyTrashed()->get();
        return view('Admin.Floor.archive', compact('floors'));
    }


    //حذف طابق ونقله للارشيف 

    public function softDelete($id)
    {
        $floor = Floor::findOrFail($id);

        $floor->delete();

        return redirect()->route('admin.floor.index')->with('success_message', 'Floor Deleted Successfully');
    }

    //حذف طابق بشكل نهائي

    public function forceDelete($id)
    {
        $floor = Floor::withTrashed()->where('id', $id)->first();
        if ($floor) {

            $floor->forceDelete();

            return redirect()->route('admin.floor.archive')->with('success_message', 'Floor Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'Floor Not Found');
        }
    }

    //استعادة الطوابق المحذوفة من الارشيف

    public function restore($id)
    {
        Floor::withTrashed()->where('id', $id)->restore();

        return redirect()->route('admin.floor.archive')->with('success_message', 'Floor Restored Successfully');
    }
}

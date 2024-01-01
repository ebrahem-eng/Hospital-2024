<?php

namespace App\Http\Controllers\Admin\Room;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Floor;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{

    //عرض صفحة جدول الغرف

    public function index()
    {
        $rooms = Room::all();
        return view('Admin.Room.index', compact('rooms'));
    }

    //عرض صفحة اضافة غرفة جديدة

    public function create()
    {
        $departments = Department::all();
        $floors = Floor::all();
        return view('Admin.Room.create', compact('departments', 'floors'));
    }

    //تخزين الغرف في قاعدة البيانات 

    public function store(Request $request)
    {

        Room::create([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'status' => $request->input('status'),
            'department_id' => $request->input('departmentID'),
            'floor_id' => $request->input('floorID'),
            'created_by' => Auth::guard('admin')->user()->id,
        ]);

        return redirect()->route('admin.room.index')->with('success_message', 'Room Created Successfully');
    }

    //عرض صفحة تعديل بيانات غرفة

    public function edit($id)
    {
        $room = Room::findOrfail($id);
        $departments = Department::all();
        $floors = Floor::all();
        return view('Admin.Room.edit', compact('room', 'departments', 'floors'));
    }

    //تعديل بيانات غرفة داخل قاعدة البيانات 

    public function update(Request $request, $id)
    {

        $room = Room::findOrFail($id);

        $room->update([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'status' => $request->input('status'),
            'department_id' => $request->input('departmentID'),
            'floor_id' => $request->input('floorID'),
        ]);

        return redirect()->route('admin.room.index')->with('success_message', 'Room Updated Successfully');
    }

    //عرض صفحة جدول الغرف المحذوفين

    public function archive()
    {
        $rooms = Room::onlyTrashed()->get();
        return view('Admin.Room.archive', compact('rooms'));
    }


    //حذف غرفة ونقله للارشيف 

    public function softDelete($id)
    {
        $room = Room::findOrFail($id);

        $room->delete();

        return redirect()->route('admin.room.index')->with('success_message', 'Room Deleted Successfully');
    }

    //حذف غرفة بشكل نهائي

    public function forceDelete($id)
    {
        $room = Room::withTrashed()->where('id', $id)->first();
        if ($room) {

            $room->forceDelete();

            return redirect()->route('admin.room.archive')->with('success_message', 'Room Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'Room Not Found');
        }
    }

    //استعادة غرفة المحذوفة من الارشيف

    public function restore($id)
    {
        Room::withTrashed()->where('id', $id)->restore();

        return redirect()->route('admin.room.archive')->with('success_message', 'Room Restored Successfully');
    }
}

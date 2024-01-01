<?php

namespace App\Http\Controllers\Admin\Complaints;

use App\Http\Controllers\Controller;
use App\Models\Complaints;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{
    //عرض صفحة جدول الشكاوي

    public function index()
    {
        $complaints = Complaints::all();
        return view('Admin.Complaint.index', compact('complaints'));
    }

    //عرض صفحة جدول الشكاوي المحذوفين

    public function archive()
    {
        $complaints = Complaints::onlyTrashed()->get();
        return view('Admin.Complaint.archive', compact('complaints'));
    }

    //حذف شكوى ونقله للارشيف 

    public function softDelete($id)
    {
        $complaint = Complaints::findOrFail($id);

        $complaint->delete();

        return redirect()->route('admin.complaint.index')->with('success_message', 'Complaint Deleted Successfully');
    }

    //حذف شكوى بشكل نهائي

    public function forceDelete($id)
    {
        $complaint = Complaints::withTrashed()->where('id', $id)->first();
        if ($complaint) {
            $complaint->forceDelete();

            return redirect()->route('admin.complaint.archive')->with('success_message', 'Complaint Deleted Successfully');
        } else {
            return redirect()->back()->with('error_message', 'Complaint Not Found');
        }
    }

    //استعادة شكوى من الارشيف

    public function restore($id)
    {
        Complaints::withTrashed()->where('id', $id)->restore();

        return redirect()->route('admin.complaint.archive')->with('success_message', 'Complaint Restored Successfully');
    }
}

<?php

namespace App\Http\Controllers\Patient\Complaints;

use App\Http\Controllers\Controller;
use App\Models\Complaints;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{
    //

    public function create()
    {
        return view('Patient.Complaints.create');
    }

    public function store(Request $request)
    {
        $title = $request->input('title');
        $subject = $request->input('subject');

        Complaints::create([
            'title' => $title,
            'subject' => $subject,
        ]);

        return redirect()->back()->with('success_message' , 'Complaints Create Successfully');
    }
}

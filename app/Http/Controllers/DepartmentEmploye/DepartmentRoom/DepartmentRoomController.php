<?php

namespace App\Http\Controllers\DepartmentEmploye\DepartmentRoom;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\PatientMedicalRecord;
use App\Models\patientRoom;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentRoomController extends Controller
{
    //

    public function index()
    {
        $departmentPatientRooms = patientRoom::all();
        return view('DepartmentEmploye.DepartmentRoom.index', compact('departmentPatientRooms'));
    }

    public function createReservation()
    {
        $rooms = Room::all();
        $patientsIDs = PatientMedicalRecord::pluck('paitentID');
        $patients = Patient::whereIn('id' , $patientsIDs)->get();

        return view('DepartmentEmploye.DepartmentRoom.createReservation' , compact('rooms' , 'patients'));

    }

    public function storeReservation(Request $request)
    {
        $enterDate = $request->input('enterDate');
        $leaveDate = $request->input('leaveDate');
        $duration = $request->input('duration');
        $reservationBy =  Auth::guard('departmentEmploye')->user()->id;
        $patientID = $request->input('patientID');
        $roomID = $request->input('roomID');

        $roomExist = patientRoom::where('roomID', $roomID)->where('status', 1)->first();
        $patientExists = patientRoom::where('patientID' , $patientID)->where('status' , 1)->first();

        if ($roomExist) {
            return redirect()->back()->with('error_message', 'The Room Already Content Patient');
        }else if($patientExists)
        {
            return redirect()->back()->with('error_message', 'Patient Already Researved In Room');
        }

        patientRoom::create([
            'enterDate' => $enterDate,
            'leaveDate' => $leaveDate,
            'duration' => $duration,
            'status' => '1',
            'reservationBy' => $reservationBy,
            'patientID' => $patientID,
            'roomID' => $roomID
        ]);

        return redirect()->route('departmentEmploye.departmentRoom.reservation.index')->with('success_message', 'Room Reservation Successfully');
    }

    public function leaveRoom($id)
    {
        $patientRoom = patientRoom::findOrfail($id);

        $patientRoom->update([
            'status' => '0',
            'leaveBy' => Auth::guard('departmentEmploye')->user()->id,
        ]);

        return redirect()->route('departmentEmploye.departmentRoom.reservation.index')->with('success_message', 'Patient Leave Successfully');

    }
}

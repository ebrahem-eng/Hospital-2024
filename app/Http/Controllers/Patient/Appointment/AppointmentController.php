<?php

namespace App\Http\Controllers\Patient\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\DoctorTimeAvailable;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    //

    public function index()
    {
        $appointments = Appointment::where('patientID' , Auth::guard('patient')->user()->id)->where('status' , 0)->get();
        return view('Patient.Appointment.index' , compact('appointments'));
    }

    public function create1()
    {
        $doctors = Doctor::all();
        return view('Patient.Appointment.create1' , compact('doctors'));
    }

    public function create2(Request $request)
    {

        $doctorID = $request->input('doctorID');

        $doctorDays = DoctorTimeAvailable::where('doctorID' , $doctorID)->get();

        return view('Patient.Appointment.create2' , compact('doctorDays' , 'doctorID'));
        
    }

    public function create3(Request $request)
    {
        $doctorID = $request->input('doctorID');
        $dayName = $request->input('dayName');
        $dateAppointment = $request->input('dateAppointment');

        $currentDate = now(); // Get the current date and time

        if (strtotime($dateAppointment) < strtotime($currentDate)) {
            return redirect()->back()->with('error_message', 'Appointment date must be in the future.');
        }

        $checkDayFound = DoctorTimeAvailable::where('dayName', $dayName)->first();
        if (!$checkDayFound) {
            return redirect()->back()->with('error_message', 'You Dont Have Any Time In This Day Please Choose Another Day Or Add Time For This Day');
        }

        $timeStartAvailable = DoctorTimeAvailable::where('dayName', $dayName)->value('startTime');
        $timeEndAvailable = DoctorTimeAvailable::where('dayName', $dayName)->value('endTime');
        $inspectionDayDuration = DoctorTimeAvailable::where('dayName', $dayName)->value('inspectionDuration');

        // Convert the time strings to DateTime objects
        $startTime = \DateTime::createFromFormat('H:i:s', $timeStartAvailable);
        $endTime = \DateTime::createFromFormat('H:i:s', $timeEndAvailable);


        // Check if DateTime objects are created successfully
        if ($startTime === false || $endTime === false) {
            // Handle the error, e.g., return an error message or log the issue
            return response()->json(['error' => 'Error creating DateTime objects.'], 500);
        }

        // Initialize an array to store the generated times
        $generatedTimes = [];

        // Generate times in the specified interval
        while ($startTime <= $endTime) {
            // Add the current time to the array
            $generatedTimes[] = $startTime->format('H:i');

            // Increment the time by the inspection duration in minutes
            $startTime->add(new \DateInterval('PT' . $inspectionDayDuration . 'M'));
        }

        // Now, $generatedTimes contains the array of times between timeStartAvailable and timeEndAvailable

        $checkTimeAvailable = Appointment::where('dayName', $dayName)
            ->where('date', $dateAppointment)
            ->pluck('endTimeAppointment', 'startTimeAppointment');

        // return $checkTimeAvailable;

        return view('Patient.Appointment.create3', compact('dayName', 'dateAppointment', 'generatedTimes', 'checkTimeAvailable' , 'doctorID'));

    }

    public function store(Request $request)
    {

        $dayName = $request->input('dayName');
        $patientIdRequest = Auth::guard('patient')->user()->id;
        $dateAppointment = $request->input('dateAppointment');
        $startTimeAppointment = $request->input('startTimeAppointment');
        $doctorID = $request->input('doctorID');
        $details = $request->input('details');

        $inspectionDayDuration = DoctorTimeAvailable::where('dayName', $dayName)->value('inspectionDuration');

        // Convert start time to DateTime object
        $startTime = \DateTime::createFromFormat('H:i', $startTimeAppointment);

        // Add inspection duration in seconds to start time
        $endTime = clone $startTime; // Clone to avoid modifying the original object
        $endTime->add(new \DateInterval('PT' . $inspectionDayDuration . 'M')); // Adding minutes

        // Format the result as a string
        $endTimeAppointment = $endTime->format('H:i');

        $checkTimeStartAndEnd = DoctorTimeAvailable::where('dayName', $dayName)
            ->where('startTime', '<=', $startTimeAppointment)
            ->where('endTime', '>=', $endTimeAppointment)
            ->exists();

        if (!$checkTimeStartAndEnd) {
            return redirect()->back()->with('error_message', 'Appointment time is not within the available time slot.');
        }


        $patient = Patient::where('id', $patientIdRequest)->first();
        if (!$patient) {
            return redirect()->back()->with('error_message', 'Patient Not Found');
        }

        $existingAppointment = Appointment::where('dayName', $dayName)
            ->where('date', $dateAppointment)
            ->where(function ($query) use ($startTimeAppointment, $endTimeAppointment) {
                $query->where(function ($innerQuery) use ($startTimeAppointment, $endTimeAppointment) {
                    $innerQuery->where('startTimeAppointment', '<=', $startTimeAppointment)
                        ->where('endTimeAppointment', '>', $startTimeAppointment);
                })
                    ->orWhere(function ($innerQuery) use ($startTimeAppointment, $endTimeAppointment) {
                        $innerQuery->where('startTimeAppointment', '<', $endTimeAppointment)
                            ->where('endTimeAppointment', '>=', $endTimeAppointment);
                    })
                    ->orWhere(function ($innerQuery) use ($startTimeAppointment, $endTimeAppointment) {
                        $innerQuery->where('startTimeAppointment', '>=', $startTimeAppointment)
                            ->where('endTimeAppointment', '<=', $endTimeAppointment);
                    });
            })
            ->first();

        if ($existingAppointment) {
            return redirect()->back()->with('error_message', 'Sorry, you already have an appointment in the same day and time.');
        }


        Appointment::create([
            'doctorID' => $doctorID,
            'patientID' => $patient->id,
            'dayName' => $dayName,
            'date' => $dateAppointment,
            'startTimeAppointment' => $startTimeAppointment,
            'endTimeAppointment' => $endTimeAppointment,
            'status' => '0',
            'details' => $details,
        ]);

        return redirect()->route('patient.appointment.index')->with('success_message', 'Appointment Added Successfully Successfully');
    }

    public function cancele($id)
    {
        $appointmentID = $id;
        $appointment = Appointment::findOrfail($appointmentID);
    
        $appointmentDate = Carbon::parse($appointment->date);
        $currentDate = Carbon::now();
    
        if ($appointmentDate->diffInDays($currentDate) >= 3) {
            $appointment->update([
                'status' => '3'
            ]);
            return redirect()->back()->with('success_message', 'Appointment Canceled Successfully');
        } else {
            return redirect()->back()->with('error_message', 'Appointment cannot be canceled within 3 days of the appointment date.');
        }
    }

    public function history()
    {
        $appointments = Appointment::where('patientID' , Auth::guard('patient')->user()->id)->where('status' ,'!=' , 0)->get();
        return view('Patient.Appointment.history' , compact('appointments'));
    }
    
}

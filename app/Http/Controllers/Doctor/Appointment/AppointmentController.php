<?php

namespace App\Http\Controllers\Doctor\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\DoctorTimeAvailable;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

    //عرض صفحة جدول المواعيد

    public function index()
    {
        $appointments = Appointment::where('doctorID', Auth::guard('doctor')->user()->id)->get();
        return view('Doctor.Appointment.index', compact('appointments'));
    }

    //عرض صفحة اضافة موعد  

    public function create1()
    {
        return view('Doctor.Appointment.create1');
    }

    public function create2(Request $request)
    {
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

        return view('Doctor.Appointment.create2', compact('dayName', 'dateAppointment', 'generatedTimes', 'checkTimeAvailable'));
    }


    //تخزين الموعد في قاعدة البيانات 

    public function store(Request $request)
    {

        // return $request->all();
        $dayName = $request->input('dayName');
        $patientIdRequest = $request->input('patientID');
        $dateAppointment = $request->input('dateAppointment');
        $startTimeAppointment = $request->input('startTimeAppointment');
        $doctorID = Auth::guard('doctor')->user()->id;
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

        return redirect()->route('doctor.appointment.index')->with('success_message', 'Appointment Added Successfully Successfully');
    }



    //انهاء الموعد واتمامه
    public function finished($id)
    {
        $appointmentID = $id;
        $appointment = Appointment::findOrfail($appointmentID);
        $appointment->update([
            'status' => '1',
        ]);
        return redirect()->route('doctor.appointment.index')->with('success_message', 'Appointment Finished Successfully Successfully');
    }

    //تأكيد عدم حضور المريض على الموعد

    public function dontCome($id)
    {
        $appointmentID = $id;
        $appointment = Appointment::findOrfail($appointmentID);
        $appointment->update([
            'status' => '2',
        ]);
        return redirect()->route('doctor.appointment.index')->with('success_message', 'Appointment Dont Come Accepted Successfully');
    }

    // الغاء الموعد مع ذكر السبب

    public function canceled(Request $request, $id)
    {
        $appointmentID = $id;
        $appointment = Appointment::findOrfail($appointmentID);
        $cancelReason = $request->input('cancelReason');
        $appointment->update([
            'status' => '3',
            'details' => $cancelReason,
        ]);
        return redirect()->route('doctor.appointment.index')->with('success_message', 'Appointment Canceled Successfully');
    }
}

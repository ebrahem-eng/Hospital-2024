<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctorID',
        'patientID',
        'dayName',
        'date',
        'startTimeAppointment',
        'endTimeAppointment',
        'status',
        'details'
    ];


     //علاقة المواعيد مع الطبيب

     public function doctor()
     {
         return $this->belongsTo(Doctor::class, 'doctorID');
     }

      //علاقة المواعيد مع المريض

      public function patient()
      {
          return $this->belongsTo(Patient::class, 'patientID');
      }
}

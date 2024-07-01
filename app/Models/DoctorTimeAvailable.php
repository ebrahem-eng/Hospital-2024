<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorTimeAvailable extends Model
{
    use HasFactory;


    protected $fillable = [
        'dayName',
        'startTime',
        'endTime',
        'inspectionDuration',
        'doctorID',
    ];

          //علاقة اوقات المعاينات المتاحة مع الطبيب

          public function doctor()
          {
              return $this->belongsTo(Doctor::class, 'doctorID');
          }
}

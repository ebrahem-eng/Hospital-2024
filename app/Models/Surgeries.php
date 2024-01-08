<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surgeries extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'report',
        'details',
        'status',
        'surgeriesResult',
        'surgeriesDate',
        'surgeriesStartTime',
        'surgeriesEndTime',
        'roomID',
        'inspectionID',
        'patientID',
        'doctorID',
    ];

      //علاقة العمليات الجراحية مع الطبيب

      public function doctor()
      {
          return $this->belongsTo(Doctor::class, 'doctorID');
      }

       //علاقة العمليات الجراحية مع المريض

       public function patient()
       {
           return $this->belongsTo(Patient::class, 'patientID');
       }

        //علاقة العمليات الجراحية مع المعاينة

        public function inspection()
        {
            return $this->belongsTo(Inspection::class, 'inspectionID');
        }

           //علاقة العمليات الجراحية مع الغرفة

           public function room()
           {
               return $this->belongsTo(Room::class, 'roomID');
           }
}

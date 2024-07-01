<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'status',
        'age',
        'phone',
        'img',
        'created_by',
    ];

    //علاقة المريض مع السجل الطبي

    public function medicalRecord()
    {
        return $this->hasMany(PatientMedicalRecord::class, 'paitentID');
    }

    //علاقة المريض مع موظف الاستقبال

    public function reception()
    {
        return $this->hasMany(Reception::class, 'created_by');
    }

      //علاقة المريض مع  الادوية

      public function medicine()
      {
          return $this->hasMany(MedicineInspectionPatient::class, 'patientID');
      }

       //علاقة المريض مع  العمليات

       public function surgeries()
       {
           return $this->hasMany(Surgeries::class, 'patientID');
       }

        //علاقة المريض مع  المواعيد

        public function appointment()
        {
            return $this->hasMany(Appointment::class, 'patientID');
        }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicineInspectionPatient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'repeat_day',
        'duration',
        'quantity',
        'daily_appointment',
        'details',
        'medicineID',
        'patientID',
        'inspectionID',
    ];


    //  علاقة ادوية المعاينة مع السجل الطبي  

    public function medicalRecord()
    {
        return $this->belongsTo(PatientMedicalRecord::class, 'inspectionID');
    }

    //  علاقة ادوية المعاينة مع  المريض  

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patientID');
    }

    //  علاقة ادوية المعاينة مع الادوية  

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicineID');
    }

       //  علاقة ادوية المعاينة مع المعاينة  

       public function inspection()
       {
           return $this->belongsTo(Inspection::class, 'inspectionID');
       }
}

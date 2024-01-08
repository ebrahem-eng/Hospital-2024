<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inspection extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'resultInspection',
        'details',
        'paitentMedicalRecordID',
    ];

    //  علاقة المعاينة مع السجل الطبي  

    public function medicalRecord()
    {
        return $this->belongsTo(PatientMedicalRecord::class, 'paitentMedicalRecordID');
    }

     //  علاقة المعاينة مع الادوية  

     public function medicine()
     {
         return $this->hasMany(MedicineInspectionPatient::class, 'inspectionID');
     }

       //  علاقة المعاينة مع المستلزمات الطبية  

       public function medicalSupplies()
       {
           return $this->hasMany(MeidcalSuppliesInspection::class, 'inspectionID');
       }

         //  علاقة المعاينة مع العمليات الجراحية  

         public function surgeries()
         {
             return $this->hasMany(Surgeries::class, 'inspectionID');
         }
}

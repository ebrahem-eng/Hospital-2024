<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InpatientMedications extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'hour',
        'checkStatus',
        'patientRoomID',
        'medicineInsPatientID',
        'medicalSuppliesInsID',
        'nurseID',
    ];

    public function medicineInspection()
    {
        return $this->belongsTo(MedicineInspectionPatient::class, 'medicineInsPatientID');
    }

    public function medicalSuppliesInspection()
    {
        return $this->belongsTo(MeidcalSuppliesInspection::class, 'medicalSuppliesInsID');
    }

    public function patientRoom()
    {
        return $this->belongsTo(patientRoom::class, 'patientRoomID');
    }

    public function nurse()
    {
        return $this->belongsTo(Nurse::class, 'nurseID');
    }
}

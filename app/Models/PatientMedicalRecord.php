<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientMedicalRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'doctorID',
        'paitentID',
        'created_by_receptionist',
        'created_by_doctor',
        'details',
    ];


    // علاقة السجل الطبي مع المريض

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'paitentID');
    }

    // علاقة السجل الطبي مع الطبيب

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctorID');
    }

    // علاقة السجل الطبي مع موظفين الاستقبال

    public function reciptionist()
    {
        return $this->belongsTo(Reception::class, 'created_by_receptionist');
    }

    //  علاقة السجل الطبي مع الطبيب الذي انشأه

    public function doctorCreated()
    {
        return $this->belongsTo(Doctor::class, 'created_by_doctor');
    }

    //علاقة  السجل الطبي مع المعاينات

    public function inspection()
    {
        return $this->hasMany(Inspection::class, 'paitentMedicalRecordID');
    }
}

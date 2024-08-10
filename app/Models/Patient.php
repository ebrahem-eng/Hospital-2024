<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'patient';

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
        return $this->belongsTo(Reception::class, 'created_by');
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}

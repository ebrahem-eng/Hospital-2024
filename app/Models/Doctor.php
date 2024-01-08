<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'doctor';
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
        'specialization_id',
    ];

    //علاقة الطبيب مع المسؤولين

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    //علاقة الطبيب مع الاختصاص

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    //علاقة الطبيب مع السجل الطبي

    public function medicalRecord()
    {
        return $this->hasMany(PatientMedicalRecord::class, 'doctorID');
    }

     //علاقة الطبيب الذي يقوم بإنشاء السجل الطبي

     public function CreatemedicalRecord()
     {
         return $this->hasMany(PatientMedicalRecord::class, 'created_by_doctor');
     }

       //علاقة الطبيب مع العمليات الجراحية 

       public function surgeries()
       {
           return $this->hasMany(Surgeries::class, 'doctorID');
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

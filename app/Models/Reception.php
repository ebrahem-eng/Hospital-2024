<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reception extends Model
{
    use HasFactory, SoftDeletes;

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

    //علاقة موظف الاستقبال مع المسؤولين

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    //علاقة موظفين الاستقبال مع السجل الطبي

    public function CreatemedicalRecord()
    {
        return $this->hasMany(PatientMedicalRecord::class, 'created_by_receptionist');
    }

    //علاقة موظفين الاستقبال مع المرضى

    public function patient()
    {
        return $this->hasMany(Patient::class, 'created_by');
    }
}

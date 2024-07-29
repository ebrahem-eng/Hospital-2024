<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reception extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard = 'reception';

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

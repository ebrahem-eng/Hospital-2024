<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard = 'admin';
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'status',
        'age',
        'phone',
        'img',
    ];

    //علاقة المدير مع الاطباء

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'created_by');
    }

    //علاقة المدير مع موظفي الاستقبال 

    public function receptions()
    {
        return $this->hasMany(Reception::class, 'created_by');
    }

    //علاقة المدير مع  امين المستودع 

    public function storeKeepers()
    {
        return $this->hasMany(StoreKeeper::class, 'created_by');
    }

    //علاقة المدير مع الاختصاصات

    public function specializations()
    {
        return $this->hasMany(Specialization::class, 'created_by');
    }

    //علاقة المدير مع الاقسام

    public function departments()
    {
        return $this->hasMany(Department::class, 'created_by');
    }

    //علاقة المدير مع موظفين الاقسام

    public function departmentEmployes()
    {
        return $this->hasMany(DepartmentEmploye::class, 'created_by');
    }

    //علاقة المدير مع الممرضين

    public function nurses()
    {
        return $this->hasMany(Nurse::class, 'created_by');
    }

    //علاقة المدير مع الغرف

    public function roooms()
    {
        return $this->hasMany(Room::class, 'created_by');
    }

    // //علاقة المدير مع الشكاوي

    // public function complaints()
    // {
    //     return $this->hasMany(Complaints::class, 'deleted_by');
    // }


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

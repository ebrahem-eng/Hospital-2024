<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'created_by',
    ];

    //علاقة القسم مع المسؤولين

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    //علاقة القسم مع موظفي القسم

    public function departmentEmploye()
    {
        return $this->hasMany(DepartmentEmploye::class,'department_id');
    }

    //علاقة القسم مع الممرضين

    public function nurse()
    {
        return $this->hasMany(Nurse::class,'department_id');
    }

    //علاقة القسم مع الغرف

    public function room()
    {
        return $this->hasMany(Room::class,'department_id');
    }
}

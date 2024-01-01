<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartmentEmploye extends Model
{
    use HasFactory , SoftDeletes;

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
        'department_id',
    ];

     //علاقة موظف القسم مع المسؤولين

     public function admin()
     {
         return $this->belongsTo(Admin::class, 'created_by');
     }

     //علاقة موظف القسم مع القسم

     public function department()
     {
         return $this->belongsTo(Department::class, 'department_id');
     }
}

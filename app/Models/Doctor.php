<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
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


}

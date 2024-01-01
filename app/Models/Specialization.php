<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialization extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'created_by'
    ];

     //علاقة الاختصااصات مع الاطباء

     public function doctors()
     {
         return $this->hasMany(Doctor::class,'specialization_id');
     }

      //علاقة الاختصاص مع المسؤولين

      public function admin()
      {
          return $this->belongsTo(Admin::class, 'created_by');
      }
}

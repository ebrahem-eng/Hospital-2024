<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'status',
        'type',
        'created_by',
        'department_id',
        'floor_id'
    ];

      //علاقة الغرفة مع المسؤولين

      public function admin()
      {
          return $this->belongsTo(Admin::class, 'created_by');
      }
 
      //علاقة الغرفة مع القسم
 
      public function department()
      {
          return $this->belongsTo(Department::class, 'department_id');
      }

       //علاقة الغرفة مع الطابق
 
       public function floor()
       {
           return $this->belongsTo(Floor::class, 'floor_id');
       }

        //علاقة الغرفة مع العملية
 
        public function surgeries()
        {
            return $this->belongsTo(Surgeries::class, 'roomID');
        }
}

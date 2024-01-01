<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Floor extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
     'name' ,
     'number',
    ];

      //علاقة الطابق مع الغرف

      public function room()
      {
          return $this->hasMany(Room::class,'floor_id');
      }

}

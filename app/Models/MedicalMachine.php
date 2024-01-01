<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalMachine extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'details',
        'status',
        'img',
        'quantity',
        'created_by',
    ];

        //علاقة الاجهزة الطبية مع امين المستودع

        public function storeKeeper()
        {
            return $this->belongsTo(StoreKeeper::class, 'created_by');
        }

}

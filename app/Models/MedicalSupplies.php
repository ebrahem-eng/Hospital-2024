<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalSupplies extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'details',
        'status',
        'img',
        'quantity',
        'deletedQuantity',
        'created_by',
    ];

        //علاقة المستلزمات الطبية مع امين المستودع

        public function storeKeeper()
        {
            return $this->belongsTo(StoreKeeper::class, 'created_by');
        }

         //  علاقة المستلزمات الطبية  مع المستلزمات الطبية للمعاينة

       public function medicalSuppliesInspection()
       {
           return $this->hasMany(MeidcalSuppliesInspection::class, 'medicalSuppliesID');
       }
}

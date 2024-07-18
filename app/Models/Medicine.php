<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'calibres',
        'quantity',
        'deletedQuantity',
        'price',
        'details',
        'img',
        'created_by',
    ];


    //علاقة الادوية مع امين المستودع

    public function storeKeeper()
    {
        return $this->belongsTo(StoreKeeper::class, 'created_by');
    }

     //علاقة الادوية مع ادوية المعاينة

     public function inspection()
     {
         return $this->belongsTo(MedicineInspectionPatient::class, 'medicineID');
     }
}

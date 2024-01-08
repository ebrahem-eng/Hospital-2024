<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeidcalSuppliesInspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'inspectionID',
        'medicalSuppliesID',
    ];

    //  علاقة المستلزمات الطبية للمعاينة مع  المعاينة  

    public function inspection()
    {
        return $this->belongsTo(Inspection::class, 'inspectionID');
    }

    //  علاقة المستلزمات الطبية للمعاينة مع  المستلزمات الطبية  

    public function medicalSupplies()
    {
        return $this->belongsTo(MedicalSupplies::class, 'medicalSuppliesID');
    }
}

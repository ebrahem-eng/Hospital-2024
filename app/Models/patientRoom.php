<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patientRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'enterDate',
        'leaveDate',
        'duration',
        'status',
        'reservationBy',
        'patientID',
        'leaveBy',
        'roomID',
    ];

    public function departmentEmployeEnter()
    {
        return $this->belongsTo(DepartmentEmploye::class, 'reservationBy');
    }

    public function departmentEmployeLeave()
    {
        return $this->belongsTo(DepartmentEmploye::class, 'leaveBy');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patientID');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'roomID');
    }
}

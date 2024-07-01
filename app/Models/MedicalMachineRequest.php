<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalMachineRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctorID',
        'medicalMachineID',
        'storeKeeperID',
        'adminID',
        'detailsRequest',
        'refuseCause',
        'status',
    ];

      //علاقة طلبات الاجهزة الطبية مع الطبيب

      public function doctor()
      {
          return $this->belongsTo(Doctor::class, 'doctorID');
      }

       //علاقة طلبات الاجهزة الطبية مع الاجهزة الطبية

       public function medicalMachine()
       {
           return $this->belongsTo(MedicalMachine::class, 'medicalMachineID');
       }

        //علاقة طلبات الاجهزة الطبية مع امناء المستودع

        public function storeKeeper()
        {
            return $this->belongsTo(StoreKeeper::class, 'storeKeeperID');
        }

           //علاقة طلبات الاجهزة الطبية مع  المدير

           public function admin()
           {
               return $this->belongsTo(Admin::class, 'adminID');
           }
}

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
}

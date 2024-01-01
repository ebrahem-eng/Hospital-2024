<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complaints extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'title',
        'subject',
        'deleted_by',
    ];

    //  //علاقة الشكوى مع المسؤولين

    //  public function admin()
    //  {
    //      return $this->belongsTo(Admin::class, 'deleted_by');
    //  }

}

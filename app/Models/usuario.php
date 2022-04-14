<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    use HasFactory;

    public function rol(){
        return $this->belongsTo(rol::class,'idRolFK');
    }

    public function ventas(){
        return $this->hasMany(detalleventa::class,'id');
    }
}

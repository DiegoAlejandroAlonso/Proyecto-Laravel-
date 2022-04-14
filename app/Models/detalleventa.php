<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalleventa extends Model
{
    use HasFactory;

    public function producto(){
        return $this->belongsTo(producto::class,'idProductoFK');
    }

    public function usuario(){
        return $this->belongsTo(usuario::class,'idUsuarioFK');
    }
}

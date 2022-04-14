<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
     //belongTo = una // un producto tiene muchas marcas


    public function marca(){
        return $this->belongsTo(Marca::class,'idMarcaFK');
    }

    
    //hasmany = muchos
    
    public function ventas(){
        return $this->hasMany(detalleventa::class,'id');
    }
}

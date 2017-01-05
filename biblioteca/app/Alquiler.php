<?php

namespace Biblio;

use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    protected $table = 'alquileres';

    protected $fillable = ['fk_lector','fk_libro','fecha_salida','fecha_entrada'];

    public function lector(){
    	return $this->belongsTo('Biblio\Lector','fk_lector');
    }
    
    public function libro(){
    	return $this->belongsTo('Biblio\Libro','fk_libro');
    }
}

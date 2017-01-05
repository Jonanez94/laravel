<?php

namespace Biblio;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';

    protected $fillable = ['titulo','fecha_lanzamiento','fk_autor','fk_categoria','fk_editorial','descripcion','paginas'];

    public function autor(){
    	return $this->belongsTo('Biblio\Autor','fk_autor');
    }

    public function categoria(){
    	return $this->belongsTo('Biblio\Categoria','fk_categoria');
    }

    public function editorial(){
    	return $this->belongsTo('Biblio\Editorial','fk_editorial');
    }

    public function alquileres(){
        return $this->hasMany('Biblio\Alquiler');
    }
}

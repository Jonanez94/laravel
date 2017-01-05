<?php

namespace Biblio;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = ['categoria'];

    public function libros(){
    	return $this->hasMany('Biblio\Libro');
    }
}

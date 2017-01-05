<?php

namespace Biblio;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores';

    protected $fillable = ['autor'];

    public function libros(){
    	return $this->hasMany('Biblio\Libro');
    }
}

<?php

namespace Biblio;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    protected $table = 'editoriales';

    protected $fillable = ['editorial'];

    public function libro(){
    	return $this->hasMany('Biblio\Libro');
    }
}

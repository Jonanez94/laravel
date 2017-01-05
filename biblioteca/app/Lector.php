<?php

namespace Biblio;

use Illuminate\Database\Eloquent\Model;

class Lector extends Model
{
    protected $table = 'lectores';

    protected $fillable = ['nombre','correo','edad','password','direccion','observaciones'];

    protected $hidden = ['password', 'remember_token'];

    public function alquileres(){
    	return $this->hasMany('Biblio\Alquiler');
    }
}

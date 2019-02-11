<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    protected $fillable = ['nombre'];
    protected $table = 'lineas';

    //Retorna la Imagen
    public function getUrlAttribute(){
    	if(substr($this->imagen,0,4)==="http"){
    		return $this->imagen;
    	}
    	return '/imagenes/lineas/'.$this->imagen;
    }
}

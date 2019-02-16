<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Linea extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre'];
    protected $dates = ['deleted_at'];
    protected $table = 'lineas';

    //Retorna la Imagen
    public function getUrlAttribute(){
    	if(substr($this->imagen,0,4)==="http"){
    		return $this->imagen;
    	}
    	return '/imagenes/lineas/'.$this->imagen;
    }
}

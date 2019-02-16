<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contrato extends Model
{
    use SoftDeletes;

    protected $fillable = ['horas'];
    protected $dates = ['deleted_at'];
    protected $table = 'contratos';
}

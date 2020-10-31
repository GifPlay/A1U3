<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idformulario';
    protected $table = 'formulario';
    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apeliidoMaterno',
        'email',
        'telefono',
        'descripcion'
    ];
}

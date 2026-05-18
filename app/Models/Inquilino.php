<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquilino extends Model
{
    use HasFactory;

    protected $fillable = [
        'block_id',
        'nombre',
        'rut',
        'telefono',
        'email',
        'departamento',
        'fecha_ingreso',
        'fecha_salida',
        'estado',
        'observacion'
    ];

    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function gastosComunes()
    {
        return $this->hasMany(GastoComun::class);
    }
}

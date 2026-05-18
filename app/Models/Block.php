<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $fillable = [
        'condominio_id',
        'nombre',
        'pisos',
        'numero_departamento',
        'observacion'
    ];
    public function condominio()
    {
        return $this->belongsTo(Condominio::class);
    }

    public function inquilinos()
    {
        return $this->hasMany(Inquilino::class);
    }
}

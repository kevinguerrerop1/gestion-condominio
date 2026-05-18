<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GastoComun extends Model
{
    use HasFactory;

    protected $fillable = [
        'inquilino_id',
        'mes',
        'anio',
        'monto',
        'interes',
        'total',
        'fecha_vencimiento',
        'fecha_pago',
        'estado',
        'metodo_pago',
        'observacion'
    ];

    public function inquilino()
    {
        return $this->belongsTo(Inquilino::class);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\GastoComun;
use App\Models\Condominio;
use App\Models\Block;
use App\Models\Inquilino;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index(Request $request)
    {
        $query = GastoComun::with([
            'inquilino',
            'inquilino.block',
            'inquilino.block.condominio'
        ]);

        if ($request->filled('estado')) {

            $query->where('estado', $request->estado);
        }

        if ($request->filled('mes')) {

            $query->where('mes', $request->mes);
        }

        if ($request->filled('anio')) {

            $query->where('anio', $request->anio);
        }

        $registros = $query->latest()
            ->paginate(15);

        $totalPagado = GastoComun::where('estado', 'pagado')
            ->sum('total');

        $totalPendiente = GastoComun::where('estado', 'pendiente')
            ->sum('total');

        $totalVencido = GastoComun::where('estado', 'vencido')
            ->sum('total');

        return view('reportes.index', compact(
            'registros',
            'totalPagado',
            'totalPendiente',
            'totalVencido'
        ));
    }

    public function consultaRut()
    {
        return view('reportes.consulta_rut');
    }

    public function buscarRut(Request $request)
    {
        $request->validate([
            'rut' => 'required'
        ]);

        $inquilino = Inquilino::with([
            'block',
            'block.condominio',
            'gastosComunes'
        ])
            ->where('rut', $request->rut)
            ->first();

        return view('reportes.consulta_rut', compact('inquilino'));
    }
}

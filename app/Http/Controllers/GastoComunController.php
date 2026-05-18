<?php

namespace App\Http\Controllers;

use App\Models\GastoComun;
use App\Models\Inquilino;
use Illuminate\Http\Request;

class GastoComunController extends Controller
{
    public function index()
    {
        $gastos = GastoComun::with('inquilino')
            ->latest()
            ->paginate(10);

        return view('gastos_comunes.index', compact('gastos'));
    }

    public function create()
    {
        $inquilinos = Inquilino::all();

        return view('gastos_comunes.create', compact('inquilinos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'inquilino_id' => 'required',
            'mes' => 'required',
            'anio' => 'required',
            'monto' => 'required'
        ]);

        $total = $request->monto + $request->interes;

        GastoComun::create([
            'inquilino_id' => $request->inquilino_id,
            'mes' => $request->mes,
            'anio' => $request->anio,
            'monto' => $request->monto,
            'interes' => $request->interes ?? 0,
            'total' => $total,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'fecha_pago' => $request->fecha_pago,
            'estado' => $request->estado,
            'metodo_pago' => $request->metodo_pago,
            'observacion' => $request->observacion
        ]);

        return redirect()
            ->route('gastos-comunes.index')
            ->with('success', 'Gasto común registrado');
    }

    public function edit(GastoComun $gastos_comune)
    {
        $inquilinos = Inquilino::all();

        return view('gastos_comunes.edit', [
            'gasto' => $gastos_comune,
            'inquilinos' => $inquilinos
        ]);
    }

    public function update(Request $request, GastoComun $gastos_comune)
    {
        $total = $request->monto + $request->interes;

        $gastos_comune->update([
            'inquilino_id' => $request->inquilino_id,
            'mes' => $request->mes,
            'anio' => $request->anio,
            'monto' => $request->monto,
            'interes' => $request->interes ?? 0,
            'total' => $total,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'fecha_pago' => $request->fecha_pago,
            'estado' => $request->estado,
            'metodo_pago' => $request->metodo_pago,
            'observacion' => $request->observacion
        ]);

        return redirect()
            ->route('gastos-comunes.index')
            ->with('success', 'Registro actualizado');
    }

    public function destroy(GastoComun $gastos_comune)
    {
        $gastos_comune->delete();

        return back()
            ->with('success', 'Registro eliminado');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Condominio;
use App\Models\Block;
use App\Models\Inquilino;
use App\Models\GastoComun;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCondominios = Condominio::count();

        $totalBlocks = Block::count();

        $totalInquilinos = Inquilino::count();

        $totalPagado = GastoComun::where('estado', 'pagado')
            ->sum('total');

        $totalPendiente = GastoComun::where('estado', 'pendiente')
            ->sum('total');

        $totalVencido = GastoComun::where('estado', 'vencido')
            ->sum('total');

        $ultimosPagos = GastoComun::with('inquilino')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalCondominios',
            'totalBlocks',
            'totalInquilinos',
            'totalPagado',
            'totalPendiente',
            'totalVencido',
            'ultimosPagos'
        ));
    }
}

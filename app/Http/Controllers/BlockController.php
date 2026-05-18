<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Condominio;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function index()
    {
        $blocks = Block::with('condominio')
            ->latest()
            ->paginate(10);

        return view('blocks.index', compact('blocks'));
    }

    public function create()
    {
        $condominios = Condominio::all();

        return view('blocks.create', compact('condominios'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'condominio_id' => 'required',

            'nombre' => 'required|max:255',

            'pisos' => 'required',

            'numero_departamento' => 'required|max:50'

        ]);

        Block::create([

            'condominio_id' => $request->condominio_id,

            'nombre' => $request->nombre,

            'pisos' => $request->pisos,

            'numero_departamento' => $request->numero_departamento,

            'observacion' => $request->observacion

        ]);

        return redirect()
            ->route('blocks.index')
            ->with('success', 'Block creado correctamente');
    }

    public function show(Block $block)
    {
        //
    }

    public function edit(Block $block)
    {
        $condominios = Condominio::all();

        return view('blocks.edit', compact('block', 'condominios'));
    }

    public function update(Request $request, Block $block)
    {
        $request->validate([

            'condominio_id' => 'required',

            'nombre' => 'required|max:255',

            'pisos' => 'required',

            'numero_departamento' => 'required|max:50'

        ]);

        $block->update([

            'condominio_id' => $request->condominio_id,

            'nombre' => $request->nombre,

            'pisos' => $request->pisos,

            'numero_departamento' => $request->numero_departamento,

            'observacion' => $request->observacion

        ]);

        return redirect()
            ->route('blocks.index')
            ->with('success', 'Block actualizado');
    }

    public function destroy(Block $block)
    {
        $block->delete();

        return back()
            ->with('success', 'Block eliminado');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Condominio;
use Illuminate\Http\Request;

class CondominioController extends Controller
{
    public function index()
    {
        $condominios = Condominio::latest()
            ->paginate(10);

        return view('condominios.index', compact('condominios'));
    }

    public function create()
    {
        return view('condominios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255'
        ]);

        Condominio::create($request->all());

        return redirect()
            ->route('condominios.index')
            ->with('success', 'Condominio creado correctamente');
    }

    public function show(Condominio $condominio)
    {
        //
    }

    public function edit(Condominio $condominio)
    {
        return view('condominios.edit', compact('condominio'));
    }

    public function update(Request $request, Condominio $condominio)
    {
        $request->validate([
            'nombre' => 'required|max:255'
        ]);

        $condominio->update($request->all());

        return redirect()
            ->route('condominios.index')
            ->with('success', 'Condominio actualizado');
    }

    public function destroy(Condominio $condominio)
    {
        $condominio->delete();

        return back()
            ->with('success', 'Condominio eliminado');
    }
}

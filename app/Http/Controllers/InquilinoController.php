<?php

namespace App\Http\Controllers;

use App\Models\Inquilino;
use App\Models\Block;
use Illuminate\Http\Request;


class InquilinoController extends Controller
{
    public function index()
    {
        $inquilinos = Inquilino::with('block')
            ->latest()
            ->paginate(10);

        return view('inquilinos.index', compact('inquilinos'));
    }

    public function create()
    {
        $blocks = Block::all();

        return view('inquilinos.create', compact('blocks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'block_id' => 'required',
            'nombre' => 'required'
        ]);

        Inquilino::create($request->all());

        return redirect()
            ->route('inquilinos.index')
            ->with('success', 'Inquilino registrado');
    }

    public function edit(Inquilino $inquilino)
    {
        $blocks = Block::all();

        return view('inquilinos.edit', compact('inquilino', 'blocks'));
    }

    public function update(Request $request, Inquilino $inquilino)
    {
        $request->validate([
            'block_id' => 'required',
            'nombre' => 'required'
        ]);

        $inquilino->update($request->all());

        return redirect()
            ->route('inquilinos.index')
            ->with('success', 'Inquilino actualizado');
    }

    public function destroy(Inquilino $inquilino)
    {
        $inquilino->delete();

        return back()
            ->with('success', 'Inquilino eliminado');
    }
}

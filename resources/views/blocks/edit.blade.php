@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow-sm">

        <div class="card-header">
            Editar Block
        </div>

        <div class="card-body">

            <form action="{{ route('blocks.update', $block) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Condominio
                    </label>

                    <select name="condominio_id" class="form-select" required>

                        @foreach($condominios as $condominio)

                        <option value="{{ $condominio->id }}" {{ $block->condominio_id == $condominio->id ? 'selected' : '' }}>

                            {{ $condominio->nombre }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Nombre Block
                    </label>

                    <input type="text" name="nombre" class="form-control" value="{{ $block->nombre }}" required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Pisos
                    </label>

                    <input type="number" name="pisos" class="form-control" value="{{ $block->pisos }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Cantidad Departamentos
                    </label>

                    <input type="number" name="cantidad_departamentos" class="form-control" value="{{ $block->cantidad_departamentos }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Observación
                    </label>

                    <textarea name="observacion" rows="4" class="form-control">{{ $block->observacion }}</textarea>

                </div>

                <button class="btn btn-primary">
                    Actualizar
                </button>

            </form>

        </div>

    </div>

</div>

@endsection

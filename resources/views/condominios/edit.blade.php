@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow-sm">

        <div class="card-header">
            Editar Condominio
        </div>

        <div class="card-body">

            <form action="{{ route('condominios.update', $condominio) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Nombre
                    </label>

                    <input type="text" name="nombre" class="form-control" value="{{ $condominio->nombre }}" required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Dirección
                    </label>

                    <input type="text" name="direccion" class="form-control" value="{{ $condominio->direccion }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Teléfono
                    </label>

                    <input type="text" name="telefono" class="form-control" value="{{ $condominio->telefono }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input type="email" name="email" class="form-control" value="{{ $condominio->email }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Observación
                    </label>

                    <textarea name="observacion" rows="4" class="form-control">{{ $condominio->observacion }}</textarea>

                </div>

                <button class="btn btn-primary">
                    Actualizar
                </button>

            </form>

        </div>

    </div>

</div>

@endsection

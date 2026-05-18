@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow-sm">

        <div class="card-header">
            Nuevo Condominio
        </div>

        <div class="card-body">

            <form action="{{ route('condominios.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Nombre
                    </label>

                    <input type="text" name="nombre" class="form-control" required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Dirección
                    </label>

                    <input type="text" name="direccion" class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Teléfono
                    </label>

                    <input type="text" name="telefono" class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input type="email" name="email" class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Observación
                    </label>

                    <textarea name="observacion" rows="4" class="form-control"></textarea>

                </div>

                <button class="btn btn-primary">
                    Guardar
                </button>

            </form>

        </div>

    </div>

</div>

@endsection

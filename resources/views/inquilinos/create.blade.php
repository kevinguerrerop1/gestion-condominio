@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-dark text-white">

                    Nuevo Inquilino

                </div>

                <div class="card-body p-4">

                    <form action="{{ route('inquilinos.store') }}" method="POST">

                        @csrf

                        <!-- DEPARTAMENTOS -->

                        <div class="mb-4">

                            <label class="form-label fw-bold d-block mb-3">

                                Seleccione Departamento

                            </label>

                            <div class="row">

                                @foreach($blocks as $block)

                                <div class="col-md-3 col-6 mb-2">

                                    <input type="radio" class="btn-check" name="block_id" id="block{{ $block->id }}" value="{{ $block->id }}" autocomplete="off" required>

                                    <label class="btn btn-outline-primary w-100 text-center py-3" for="block{{ $block->id }}">

                                        <div class="fw-bold">

                                            {{ $block->numero_departamento }}

                                        </div>

                                        <small>

                                            {{ $block->nombre }}

                                        </small>

                                    </label>

                                </div>

                                @endforeach

                            </div>

                        </div>

                        <!-- NOMBRE -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                Nombre Completo

                            </label>

                            <input type="text" name="nombre" class="form-control" required>

                        </div>

                        <!-- RUT -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                RUT

                            </label>

                            <input type="text" name="rut" class="form-control">

                        </div>

                        <!-- TELEFONO -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                Teléfono

                            </label>

                            <input type="text" name="telefono" class="form-control">

                        </div>

                        <!-- EMAIL -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                Email

                            </label>

                            <input type="email" name="email" class="form-control">

                        </div>

                        <!-- FECHA INGRESO -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                Fecha Ingreso

                            </label>

                            <input type="date" name="fecha_ingreso" class="form-control">

                        </div>

                        <!-- ESTADO -->

                        <div class="mb-4">

                            <label class="form-label fw-bold d-block mb-3">

                                Estado

                            </label>

                            <div class="row">

                                <div class="col-md-6 mb-2">

                                    <input type="radio" class="btn-check" name="estado" id="activo" value="activo" checked>

                                    <label class="btn btn-outline-success w-100 py-3" for="activo">

                                        Activo

                                    </label>

                                </div>

                                <div class="col-md-6 mb-2">

                                    <input type="radio" class="btn-check" name="estado" id="retirado" value="retirado">

                                    <label class="btn btn-outline-danger w-100 py-3" for="retirado">

                                        Retirado

                                    </label>

                                </div>

                            </div>

                        </div>

                        <!-- OBSERVACION -->

                        <div class="mb-4">

                            <label class="form-label fw-bold">

                                Observación

                            </label>

                            <textarea name="observacion" rows="4" class="form-control"></textarea>

                        </div>

                        <!-- BOTONES -->

                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('inquilinos.index') }}" class="btn btn-light border">

                                Cancelar

                            </a>

                            <button class="btn btn-primary px-4">

                                Guardar Inquilino

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const rutInput = document.querySelector('input[name="rut"]');

        rutInput.addEventListener('input', function(e) {

            let valor = e.target.value
                .replace(/\./g, '')
                .replace(/-/g, '')
                .toUpperCase();

            valor = valor.substring(0, 9);

            if (valor.length < 2) {

                e.target.value = valor;
                return;
            }

            let cuerpo = valor.slice(0, -1);
            let dv = valor.slice(-1);

            cuerpo = cuerpo.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

            e.target.value = cuerpo + '-' + dv;

        });

    });

</script>

@endsection

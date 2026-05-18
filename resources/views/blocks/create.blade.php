@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-dark text-white">

                    Nuevo Block

                </div>

                <div class="card-body p-4">

                    <form action="{{ route('blocks.store') }}" method="POST">

                        @csrf

                        <!-- CONDOMINIO -->

                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Condominio
                            </label>

                            <select name="condominio_id" class="form-select" required>

                                <option value="">
                                    Seleccione un condominio
                                </option>

                                @foreach($condominios as $condominio)

                                <option value="{{ $condominio->id }}">

                                    {{ $condominio->nombre }}

                                </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- TORRE -->

                        <div class="mb-4">

                            <label class="form-label fw-bold d-block mb-3">

                                Torre

                            </label>

                            <div class="row">

                                <div class="col-md-6 mb-2">

                                    <input type="radio" class="btn-check" name="nombre" id="torre1" value="Torre 1" autocomplete="off" required>

                                    <label class="btn btn-outline-primary w-100 py-3" for="torre1">

                                        Torre 1

                                    </label>

                                </div>

                                <div class="col-md-6 mb-2">

                                    <input type="radio" class="btn-check" name="nombre" id="torre2" value="Torre 2" autocomplete="off">

                                    <label class="btn btn-outline-primary w-100 py-3" for="torre2">

                                        Torre 2

                                    </label>

                                </div>

                            </div>

                        </div>

                        <!-- PISOS -->

                        <div class="mb-4">

                            <label class="form-label fw-bold d-block mb-3">

                                Cantidad de Pisos

                            </label>

                            <div class="row">

                                @for($i = 1; $i <= 4; $i++) <div class="col-md-3 col-6 mb-2">

                                    <input type="radio" class="btn-check" name="pisos" id="piso{{ $i }}" value="{{ $i }}" autocomplete="off" required>

                                    <label class="btn btn-outline-dark w-100 py-3" for="piso{{ $i }}">

                                        {{ $i }} Piso{{ $i > 1 ? 's' : '' }}

                                    </label>

                            </div>

                            @endfor

                        </div>

                </div>

                <!-- NUMERO DEPARTAMENTO -->

                <div class="mb-4">

                    <label class="form-label fw-bold">

                        Número Departamento

                    </label>

                    <input type="text" name="numero_departamento" class="form-control" placeholder="Ej: 101" required>

                    <small class="text-muted">

                        Ingrese el número del departamento asociado al block.

                    </small>

                </div>

                <!-- OBSERVACION -->

                <div class="mb-4">

                    <label class="form-label fw-bold">

                        Observación

                    </label>

                    <textarea name="observacion" rows="4" class="form-control" placeholder="Ingrese observaciones del block"></textarea>

                </div>

                <!-- BOTONES -->

                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('blocks.index') }}" class="btn btn-light border">

                        Cancelar

                    </a>

                    <button class="btn btn-primary px-4">

                        Guardar Block

                    </button>

                </div>

                </form>

            </div>

        </div>

    </div>

</div>

</div>

@endsection

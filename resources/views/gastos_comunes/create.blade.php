@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow-sm">

        <div class="card-header">
            Registrar Gasto Común
        </div>

        <div class="card-body">

            <form action="{{ route('gastos-comunes.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Inquilino
                    </label>

                    <select name="inquilino_id" class="form-select" required>

                        <option value="">
                            Seleccione
                        </option>

                        @foreach($inquilinos as $inquilino)

                        <option value="{{ $inquilino->id }}">

                            {{ $inquilino->nombre }}
                            -
                            Depto {{ $inquilino->departamento }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Mes
                        </label>

                        <select name="mes" class="form-select" required>

                            <option value="Enero">Enero</option>
                            <option value="Febrero">Febrero</option>
                            <option value="Marzo">Marzo</option>
                            <option value="Abril">Abril</option>
                            <option value="Mayo">Mayo</option>
                            <option value="Junio">Junio</option>
                            <option value="Julio">Julio</option>
                            <option value="Agosto">Agosto</option>
                            <option value="Septiembre">Septiembre</option>
                            <option value="Octubre">Octubre</option>
                            <option value="Noviembre">Noviembre</option>
                            <option value="Diciembre">Diciembre</option>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Año
                        </label>

                        <input type="number" name="anio" class="form-control" value="{{ date('Y') }}" required>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Monto
                        </label>

                        <input type="number" name="monto" class="form-control" required>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Interés
                        </label>

                        <input type="number" name="interes" class="form-control" value="0">

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Estado
                        </label>

                        <select name="estado" class="form-select">

                            <option value="pendiente">
                                Pendiente
                            </option>

                            <option value="pagado">
                                Pagado
                            </option>

                            <option value="vencido">
                                Vencido
                            </option>

                        </select>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Fecha vencimiento
                        </label>

                        <input type="date" name="fecha_vencimiento" class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Fecha pago
                        </label>

                        <input type="date" name="fecha_pago" class="form-control">

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Método pago
                    </label>

                    <select name="metodo_pago" class="form-select">

                        <option value="">
                            Seleccione
                        </option>

                        <option value="Efectivo">
                            Efectivo
                        </option>

                        <option value="Transferencia">
                            Transferencia
                        </option>

                        <option value="Tarjeta">
                            Tarjeta
                        </option>

                    </select>

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

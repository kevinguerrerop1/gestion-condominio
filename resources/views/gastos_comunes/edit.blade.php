@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow-sm">

        <div class="card-header">
            Editar Gasto Común
        </div>

        <div class="card-body">

            <form action="{{ route('gastos-comunes.update', $gasto) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Inquilino
                    </label>

                    <select name="inquilino_id" class="form-select" required>

                        @foreach($inquilinos as $inquilino)

                        <option value="{{ $inquilino->id }}" {{ $gasto->inquilino_id == $inquilino->id ? 'selected' : '' }}>

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

                        <select name="mes" class="form-select">

                            @php

                            $meses = [
                            'Enero',
                            'Febrero',
                            'Marzo',
                            'Abril',
                            'Mayo',
                            'Junio',
                            'Julio',
                            'Agosto',
                            'Septiembre',
                            'Octubre',
                            'Noviembre',
                            'Diciembre'
                            ];

                            @endphp

                            @foreach($meses as $mes)

                            <option value="{{ $mes }}" {{ $gasto->mes == $mes ? 'selected' : '' }}>

                                {{ $mes }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Año
                        </label>

                        <input type="number" name="anio" class="form-control" value="{{ $gasto->anio }}" required>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Monto
                        </label>

                        <input type="number" name="monto" class="form-control" value="{{ $gasto->monto }}" required>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Interés
                        </label>

                        <input type="number" name="interes" class="form-control" value="{{ $gasto->interes }}">

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Estado
                        </label>

                        <select name="estado" class="form-select">

                            <option value="pendiente" {{ $gasto->estado == 'pendiente' ? 'selected' : '' }}>

                                Pendiente

                            </option>

                            <option value="pagado" {{ $gasto->estado == 'pagado' ? 'selected' : '' }}>

                                Pagado

                            </option>

                            <option value="vencido" {{ $gasto->estado == 'vencido' ? 'selected' : '' }}>

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

                        <input type="date" name="fecha_vencimiento" class="form-control" value="{{ $gasto->fecha_vencimiento }}">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Fecha pago
                        </label>

                        <input type="date" name="fecha_pago" class="form-control" value="{{ $gasto->fecha_pago }}">

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Método pago
                    </label>

                    <select name="metodo_pago" class="form-select">

                        <option value="Efectivo" {{ $gasto->metodo_pago == 'Efectivo' ? 'selected' : '' }}>

                            Efectivo

                        </option>

                        <option value="Transferencia" {{ $gasto->metodo_pago == 'Transferencia' ? 'selected' : '' }}>

                            Transferencia

                        </option>

                        <option value="Tarjeta" {{ $gasto->metodo_pago == 'Tarjeta' ? 'selected' : '' }}>

                            Tarjeta

                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Observación
                    </label>

                    <textarea name="observacion" rows="4" class="form-control">{{ $gasto->observacion }}</textarea>

                </div>

                <button class="btn btn-primary">
                    Actualizar
                </button>

            </form>

        </div>

    </div>

</div>

@endsection

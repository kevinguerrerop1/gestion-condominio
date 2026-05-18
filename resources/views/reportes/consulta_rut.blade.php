@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-10">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-primary text-white">

                    Buscar Estado de Cuenta por RUT

                </div>

                <div class="card-body">

                    <form action="{{ route('reportes.buscar-rut') }}" method="POST">

                        @csrf

                        <div class="row">

                            <div class="col-md-10">

                                <input type="text" name="rut" class="form-control" placeholder="Ingrese RUT" required>

                            </div>

                            <div class="col-md-2">

                                <button class="btn btn-primary w-100">

                                    Buscar

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

            @isset($inquilino)

            <div class="card shadow-sm border-0 mt-4">

                <div class="card-header bg-dark text-white">

                    Información del Inquilino

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <strong>Nombre:</strong><br>

                            {{ $inquilino->nombre }}

                        </div>

                        <div class="col-md-6 mb-3">

                            <strong>RUT:</strong><br>

                            {{ $inquilino->rut }}

                        </div>

                        <div class="col-md-6 mb-3">

                            <strong>Teléfono:</strong><br>

                            {{ $inquilino->telefono }}

                        </div>

                        <div class="col-md-6 mb-3">

                            <strong>Email:</strong><br>

                            {{ $inquilino->email }}

                        </div>

                        <div class="col-md-6 mb-3">

                            <strong>Condominio:</strong><br>

                            {{ $inquilino->block->condominio->nombre }}

                        </div>

                        <div class="col-md-6 mb-3">

                            <strong>Block:</strong><br>

                            {{ $inquilino->block->nombre }}

                        </div>

                        <div class="col-md-6 mb-3">

                            <strong>Departamento:</strong><br>

                            {{ $inquilino->departamento }}

                        </div>

                        <div class="col-md-6 mb-3">

                            <strong>Estado:</strong><br>

                            {{ ucfirst($inquilino->estado) }}

                        </div>

                    </div>

                </div>

            </div>

            @php

            $pagado = $inquilino->gastosComunes
            ->where('estado', 'pagado')
            ->sum('total');

            $pendiente = $inquilino->gastosComunes
            ->where('estado', 'pendiente')
            ->sum('total');

            $vencido = $inquilino->gastosComunes
            ->where('estado', 'vencido')
            ->sum('total');

            @endphp

            <div class="row mt-4">

                <div class="col-md-4 mb-3">

                    <div class="card bg-success text-white border-0 shadow-sm">

                        <div class="card-body">

                            <h6>Pagado</h6>

                            <h3>
                                ${{ number_format($pagado, 0, ',', '.') }}
                            </h3>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 mb-3">

                    <div class="card bg-warning border-0 shadow-sm">

                        <div class="card-body">

                            <h6>Pendiente</h6>

                            <h3>
                                ${{ number_format($pendiente, 0, ',', '.') }}
                            </h3>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 mb-3">

                    <div class="card bg-danger text-white border-0 shadow-sm">

                        <div class="card-body">

                            <h6>Vencido</h6>

                            <h3>
                                ${{ number_format($vencido, 0, ',', '.') }}
                            </h3>

                        </div>

                    </div>

                </div>

            </div>

            <div class="card shadow-sm border-0 mt-4">

                <div class="card-header">

                    Historial de Gastos Comunes

                </div>

                <div class="card-body table-responsive">

                    <table class="table table-hover align-middle">

                        <thead>

                            <tr>

                                <th>Mes</th>
                                <th>Año</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Fecha Pago</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($inquilino->gastosComunes as $gasto)

                            <tr>

                                <td>
                                    {{ $gasto->mes }}
                                </td>

                                <td>
                                    {{ $gasto->anio }}
                                </td>

                                <td>
                                    ${{ number_format($gasto->total, 0, ',', '.') }}
                                </td>

                                <td>

                                    @if($gasto->estado == 'pagado')

                                    <span class="badge bg-success">
                                        Pagado
                                    </span>

                                    @elseif($gasto->estado == 'vencido')

                                    <span class="badge bg-danger">
                                        Vencido
                                    </span>

                                    @else

                                    <span class="badge bg-warning text-dark">
                                        Pendiente
                                    </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $gasto->fecha_pago }}
                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

            @endisset

        </div>

    </div>

</div>

@endsection

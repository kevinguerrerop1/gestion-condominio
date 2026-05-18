@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            Reportes Financieros
        </h2>

        <a href="{{ route('reportes.consulta-rut') }}" class="btn btn-dark">

            Consulta por RUT

        </a>

    </div>

    <div class="row">

        <div class="col-md-4 mb-3">

            <div class="card border-0 shadow-sm bg-success text-white">

                <div class="card-body">

                    <h6>Total Pagado</h6>

                    <h3>
                        ${{ number_format($totalPagado, 0, ',', '.') }}
                    </h3>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card border-0 shadow-sm bg-warning">

                <div class="card-body">

                    <h6>Total Pendiente</h6>

                    <h3>
                        ${{ number_format($totalPendiente, 0, ',', '.') }}
                    </h3>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card border-0 shadow-sm bg-danger text-white">

                <div class="card-body">

                    <h6>Total Vencido</h6>

                    <h3>
                        ${{ number_format($totalVencido, 0, ',', '.') }}
                    </h3>

                </div>

            </div>

        </div>

    </div>

    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header">
            Filtros
        </div>

        <div class="card-body">

            <form method="GET" action="{{ route('reportes.index') }}">

                <div class="row">

                    <div class="col-md-3 mb-3">

                        <label class="form-label">
                            Estado
                        </label>

                        <select name="estado" class="form-select">

                            <option value="">
                                Todos
                            </option>

                            <option value="pagado">
                                Pagado
                            </option>

                            <option value="pendiente">
                                Pendiente
                            </option>

                            <option value="vencido">
                                Vencido
                            </option>

                        </select>

                    </div>

                    <div class="col-md-3 mb-3">

                        <label class="form-label">
                            Mes
                        </label>

                        <select name="mes" class="form-select">

                            <option value="">
                                Todos
                            </option>

                            <option>Enero</option>
                            <option>Febrero</option>
                            <option>Marzo</option>
                            <option>Abril</option>
                            <option>Mayo</option>
                            <option>Junio</option>
                            <option>Julio</option>
                            <option>Agosto</option>
                            <option>Septiembre</option>
                            <option>Octubre</option>
                            <option>Noviembre</option>
                            <option>Diciembre</option>

                        </select>

                    </div>

                    <div class="col-md-3 mb-3">

                        <label class="form-label">
                            Año
                        </label>

                        <input type="number" name="anio" class="form-control">

                    </div>

                    <div class="col-md-3 mb-3 d-flex align-items-end">

                        <button class="btn btn-primary w-100">

                            Filtrar

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-header">
            Registros
        </div>

        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>Condominio</th>
                        <th>Block</th>
                        <th>Inquilino</th>
                        <th>Mes</th>
                        <th>Año</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Fecha Pago</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($registros as $registro)

                    <tr>

                        <td>
                            {{ $registro->inquilino->block->condominio->nombre }}
                        </td>

                        <td>
                            {{ $registro->inquilino->block->nombre }}
                        </td>

                        <td>
                            {{ $registro->inquilino->nombre }}
                        </td>

                        <td>
                            {{ $registro->mes }}
                        </td>

                        <td>
                            {{ $registro->anio }}
                        </td>

                        <td>
                            ${{ number_format($registro->total, 0, ',', '.') }}
                        </td>

                        <td>

                            @if($registro->estado == 'pagado')

                            <span class="badge bg-success">
                                Pagado
                            </span>

                            @elseif($registro->estado == 'vencido')

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
                            {{ $registro->fecha_pago }}
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="8" class="text-center">

                            Sin registros

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

            {{ $registros->links() }}

        </div>

    </div>

</div>

@endsection

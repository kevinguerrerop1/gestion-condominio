@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">
        Dashboard
    </h2>

    <div class="row">

        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-sm bg-primary text-white">

                <div class="card-body">

                    <h6>
                        Condominios
                    </h6>

                    <h2>
                        {{ $totalCondominios }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-sm bg-success text-white">

                <div class="card-body">

                    <h6>
                        Blocks
                    </h6>

                    <h2>
                        {{ $totalBlocks }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-sm bg-dark text-white">

                <div class="card-body">

                    <h6>
                        Inquilinos
                    </h6>

                    <h2>
                        {{ $totalInquilinos }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-sm bg-warning">

                <div class="card-body">

                    <h6>
                        Total Pagado
                    </h6>

                    <h4>
                        ${{ number_format($totalPagado, 0, ',', '.') }}
                    </h4>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6 mb-4">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-danger text-white">

                    Pagos Pendientes

                </div>

                <div class="card-body">

                    <h3>
                        ${{ number_format($totalPendiente, 0, ',', '.') }}
                    </h3>

                </div>

            </div>

        </div>

        <div class="col-md-6 mb-4">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-secondary text-white">

                    Pagos Vencidos

                </div>

                <div class="card-body">

                    <h3>
                        ${{ number_format($totalVencido, 0, ',', '.') }}
                    </h3>

                </div>

            </div>

        </div>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-header">

            Últimos Pagos Registrados

        </div>

        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>Inquilino</th>
                        <th>Mes</th>
                        <th>Año</th>
                        <th>Total</th>
                        <th>Estado</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($ultimosPagos as $pago)

                    <tr>

                        <td>
                            {{ $pago->inquilino->nombre }}
                        </td>

                        <td>
                            {{ $pago->mes }}
                        </td>

                        <td>
                            {{ $pago->anio }}
                        </td>

                        <td>
                            ${{ number_format($pago->total, 0, ',', '.') }}
                        </td>

                        <td>

                            @if($pago->estado == 'pagado')

                            <span class="badge bg-success">
                                Pagado
                            </span>

                            @elseif($pago->estado == 'vencido')

                            <span class="badge bg-danger">
                                Vencido
                            </span>

                            @else

                            <span class="badge bg-warning text-dark">
                                Pendiente
                            </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5" class="text-center">
                            Sin registros
                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection

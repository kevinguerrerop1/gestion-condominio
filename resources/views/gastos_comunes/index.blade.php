@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Gastos Comunes</h3>

        <a href="{{ route('gastos-comunes.create') }}" class="btn btn-primary">

            Registrar Pago

        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>Inquilino</th>
                        <th>Mes</th>
                        <th>Año</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Fecha Pago</th>
                        <th width="180"></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($gastos as $gasto)

                    <tr>

                        <td>
                            {{ $gasto->inquilino->nombre }}
                        </td>

                        <td>{{ $gasto->mes }}</td>

                        <td>{{ $gasto->anio }}</td>

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

                        <td>{{ $gasto->fecha_pago }}</td>

                        <td>

                            <div class="d-flex gap-2">

                                <a href="{{ route('gastos-comunes.edit', $gasto) }}" class="btn btn-warning btn-sm">

                                    Editar

                                </a>

                                <form action="{{ route('gastos-comunes.destroy', $gasto) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

            {{ $gastos->links() }}

        </div>

    </div>

</div>

@endsection

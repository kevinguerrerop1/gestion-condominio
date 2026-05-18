@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Condominios</h3>

        <a href="{{ route('condominios.create') }}" class="btn btn-primary">

            Nuevo Condominio

        </a>

    </div>

    @if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    @endif

    <div class="card shadow-sm">

        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th width="180"></th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($condominios as $condominio)

                    <tr>

                        <td>{{ $condominio->id }}</td>

                        <td>{{ $condominio->nombre }}</td>

                        <td>{{ $condominio->direccion }}</td>

                        <td>{{ $condominio->telefono }}</td>

                        <td>{{ $condominio->email }}</td>

                        <td>

                            <div class="d-flex gap-2">

                                <a href="{{ route('condominios.edit', $condominio) }}" class="btn btn-warning btn-sm">

                                    Editar

                                </a>

                                <form action="{{ route('condominios.destroy', $condominio) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar registro?')">

                                        Eliminar

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            Sin registros
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

            {{ $condominios->links() }}

        </div>

    </div>

</div>

@endsection

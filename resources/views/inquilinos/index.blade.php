@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>
            Inquilinos
        </h3>

        <a href="{{ route('inquilinos.create') }}" class="btn btn-primary">

            Nuevo Inquilino

        </a>

    </div>

    @if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

    @endif

    <div class="card shadow-sm border-0">

        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th>ID</th>
                        <th>Nombre</th>
                        <th>RUT</th>
                        <th>Torre</th>
                        <th>Depto</th>
                        <th>Teléfono</th>
                        <th>Estado</th>
                        <th width="180"></th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($inquilinos as $inquilino)

                    <tr>

                        <td>

                            {{ $inquilino->id }}

                        </td>

                        <td>

                            <div class="fw-bold">

                                {{ $inquilino->nombre }}

                            </div>

                            @if($inquilino->email)

                            <small class="text-muted">

                                {{ $inquilino->email }}

                            </small>

                            @endif

                        </td>

                        <td>

                            {{ $inquilino->rut ?? '-' }}

                        </td>

                        <td>

                            {{ $inquilino->block->nombre }}

                        </td>

                        <td>

                            <span class="badge bg-dark">

                                {{ $inquilino->block->numero_departamento }}

                            </span>

                        </td>

                        <td>

                            {{ $inquilino->telefono ?? '-' }}

                        </td>

                        <td>

                            @if($inquilino->estado == 'activo')

                            <span class="badge bg-success">

                                Activo

                            </span>

                            @else

                            <span class="badge bg-secondary">

                                Retirado

                            </span>

                            @endif

                        </td>

                        <td>

                            <div class="d-flex gap-2">

                                <a href="{{ route('inquilinos.edit', $inquilino) }}" class="btn btn-warning btn-sm">

                                    Editar

                                </a>

                                <form action="{{ route('inquilinos.destroy', $inquilino) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar inquilino?')">

                                        Eliminar

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="8" class="text-center py-4">

                            Sin registros

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

            {{ $inquilinos->links() }}

        </div>

    </div>

</div>

@endsection

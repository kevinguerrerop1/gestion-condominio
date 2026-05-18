@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>
            Blocks
        </h3>

        <a href="{{ route('blocks.create') }}" class="btn btn-primary">

            Nuevo Block

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
                        <th>Condominio</th>
                        <th>Torre</th>
                        <th>Pisos</th>
                        <th>N° Departamento</th>
                        <th>Observación</th>
                        <th width="180"></th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($blocks as $block)

                    <tr>

                        <td>
                            {{ $block->id }}
                        </td>

                        <td>
                            {{ $block->condominio->nombre }}
                        </td>

                        <td>
                            {{ $block->nombre }}
                        </td>

                        <td>
                            {{ $block->pisos }}
                        </td>

                        <td>

                            {{ $block->numero_departamento }}

                        </td>

                        <td>

                            {{ $block->observacion ?? '-' }}

                        </td>

                        <td>

                            <div class="d-flex gap-2">

                                <a href="{{ route('blocks.edit', $block) }}" class="btn btn-warning btn-sm">

                                    Editar

                                </a>

                                <form action="{{ route('blocks.destroy', $block) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar block?')">

                                        Eliminar

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7" class="text-center">

                            Sin registros

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

            {{ $blocks->links() }}

        </div>

    </div>

</div>

@endsection

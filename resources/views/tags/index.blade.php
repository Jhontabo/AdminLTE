@extends('adminlte::page')

@section('title', 'Listado de Categorías')

@section('content_header')
    <a href="{{ route('tags.create') }}" class="btn btn-secondary float-right">Crear Categoría</a>
    <h1>Listado de Categorías</h1>


@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif


    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2">Acciones</th> {{-- Colspan=2 para incluir Editar y Eliminar --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('categories.edit', $tag) }}">
                                    Editar
                                </a>
                            </td>

                            <td width="10px">
                                <form action="{{ route('tags.destroy', $tag) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

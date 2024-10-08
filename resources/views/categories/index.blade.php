@extends('adminlte::page')

@section('title', 'Listado de Categorías')

@section('content_header') 
    <h1>Listado de Categorías</h1>  
@stop  

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Crear Categoría</a>
        </div>
        
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2">Acciones</th> {{-- Colspan=2 para incluir Editar y Eliminar --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td width="100px">
                                <a class="btn btn-primary btn-sm" href="{{ route('categories.edit', $category) }}">
                                    Editar
                                </a>
                            </td>

                            <td width="100px">
                                <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" aria-label="Eliminar {{ $category->name }}">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Si tienes paginación, aquí puedes agregar los links --}}
        {{-- <div class="card-footer">
            {{ $categories->links() }}
        </div> --}}
    </div>
@stop

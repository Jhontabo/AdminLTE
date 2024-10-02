@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
<h1>Crear nueva categoría</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf <!-- Necesario para la protección contra CSRF -->

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese el nombre de la categoría" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" name="slug" class="form-control" placeholder="Ingrese el slug de la categoría" readonly value="{{ old('slug') }}">
            </div>

            <button type="submit" class="btn btn-primary">Crear categoría</button>
        </form>
    </div>
</div>
@stop


@section('js')

<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
    });
</script>
@endsection
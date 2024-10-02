@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Cambiar tag</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('tags.update', $tag) }}" method="POST">
                @csrf <!-- Necesario para la protección contra CSRF -->
                @method('PUT') <!-- Indicamos que el método real es PUT -->

                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control"
                        placeholder="Ingrese el nombre de la categoría" value="{{ old('name', $tag->name) }}">

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control"
                        placeholder="Ingrese el slug de la categoría" readonly value="{{ old('slug', $tag->slug) }}">

                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="color">Color:</label>
                    <select name="color" id="color" class="form-control">
                        @foreach ($colors as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">actualizar tag</button>
            </form>
        </div>
    </div>
@stop

@section('js')

    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

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

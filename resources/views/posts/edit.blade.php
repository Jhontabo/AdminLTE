@extends('adminlte::page')

@section('title', 'Editar Post')

@section('content_header')
    <h1>Editar Post</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('posts.update', $post) }}" method="POST">
                @csrf <!-- Necesario para la protección contra CSRF -->
                @method('PUT') <!-- Indicamos que el método real es PUT -->

                <!-- Campo para el título del post -->
                <div class="form-group">
                    <label for="name">Título del post</label>
                    <input type="text" id="name" name="name" class="form-control"
                        placeholder="Ingrese el título del post" value="{{ old('name', $post->name) }}">

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo para el slug del post -->
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control"
                        placeholder="Ingrese el slug del post" readonly value="{{ old('slug', $post->slug) }}">

                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo para el contenido del post -->
                <div class="form-group">
                    <label for="body">Contenido del post</label>
                    <textarea id="body" name="body" class="form-control" rows="5"
                        placeholder="Ingrese el contenido del post">{{ old('body', $post->body) }}</textarea>

                    @error('body')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Actualizar Post</button>
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

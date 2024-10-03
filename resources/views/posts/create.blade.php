@extends('adminlte::page')

@section('title', 'Crear Post')

@section('content_header')
    <h1>Crear nuevo post</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf <!-- Necesario para la protección contra CSRF -->

                <!-- Campo para el título del post -->
                <div class="form-group">
                    <label for="name">Título del post</label>
                    <input type="text" id="name" name="name" class="form-control"
                        placeholder="Ingrese el título del post" value="{{ old('name') }}">

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo para el slug del post -->
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control"
                        placeholder="Ingrese el slug del post" readonly value="{{ old('slug') }}">

                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo para el extracto del post -->
                <div class="form-group">
                    <label for="extract">Extracto del post</label>
                    <textarea id="extract" name="extract" class="form-control" rows="3"
                        placeholder="Ingrese el extracto del post">{{ old('extract') }}</textarea>

                    @error('extract')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo para el contenido del post -->
                <div class="form-group">
                    <label for="body">Contenido del post</label>
                    <textarea id="body" name="body" class="form-control" rows="5"
                        placeholder="Ingrese el contenido del post">{{ old('body') }}</textarea>

                    @error('body')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo para la categoría del post (opcional) -->
                <div class="form-group">
                    <label for="category_id">Categoría</label>
                    <select id="category_id" name="category_id" class="form-control">
                        <option value="">Seleccione una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo para el estado del post (opcional) -->
                <div class="form-group">
                    <label for="status">Estado</label>
                    <select id="status" name="status" class="form-control">
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Borrador</option>
                        <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Publicado</option>
                    </select>

                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Crear post</button>
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

<div class="card">
    <div class="card-header">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Crear Post</a> 
    </div> 
    
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Fecha de creación</th>
                    <th colspan="2">Acciones</th> 
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->user->name }}</td> {{-- Asegúrate de tener la relación con el usuario --}}
                        <td>{{ $post->created_at->format('d/m/Y') }}</td>
                        <td width="100px">
                            <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post) }}">
                                Editar
                            </a>
                        </td>
                        <td width="100px">
                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" aria-label="Eliminar {{ $post->name }}">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay posts disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    
</div>

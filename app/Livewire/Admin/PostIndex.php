<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;

    public function render()
    {
        // Obtener los posts de la base de datos ordenados por 'id' de menor a mayor y con paginación
        $posts = Post::orderBy('user_id', 'asc')->paginate(100);

        // Retornar la vista con los posts
        return view('livewire.admin.post-index', compact('posts'));
    }
}

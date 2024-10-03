<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



        $posts = Post::latest('id')->paginate(10);

        // Retorna la vista con las categorías
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all(); // Cargar categorías para el select
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'extract' => 'nullable', // Cambia a 'required' si quieres que sea obligatorio
            'body' => 'required',
            'category_id' => 'required',
            'status' => 'required',
        ]);

        // Asignar el user_id del usuario autenticado al crear el post
        $post = new Post($request->all());
        $post->user_id = Auth::id(); // Asignamos el user_id del usuario autenticado
        $post->save();

        return redirect()->route('posts.index')->with('info', 'El post se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required|unique:posts,name,' . $post->id,
        ]);

        $post->update($request->all());

        return redirect()->route('posts.edit', $post)->with('info', 'El post se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('info', 'El post se eliminó con éxito');
    }
}

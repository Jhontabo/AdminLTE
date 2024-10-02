<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */ public function index()
    {
        $posts = Post::all(); // O podrías usar paginate() si deseas paginación

        // Retorna la vista con las categorías
        return view('AdminPosts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AdminPosts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'name' => 'required|unique:posts',

        ]);

        $post = Post::create($request->all());
        return redirect()->route('AdminPosts.edit', $post)->with('info', 'la categoria se creo con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('AdminPosts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('AdminPosts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Post $post)
    {
        $request->validate([
            'name' => 'required',
            'name' => "required|unique:posts,slug,
            $post->id"

        ]);

        $post->update($request->all());
        return redirect()->route('AdminPosts.edit', $post)->with('info', 'la categoria se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('AdminPosts.index')->with('info', 'la categoria se elimino con exito');
    }
}

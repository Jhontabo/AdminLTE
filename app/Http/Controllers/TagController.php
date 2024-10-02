<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors = [
            'red' => 'rojo',
            'green' => 'verde',
            'blue' => 'azul',
            'yellow' => 'amarillo',
            'purple' => 'morado',
            'orange' => 'naranja',
            'pink' => 'rosado',
            'brown' => 'cafe',
        ];
        return view('tags.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'slug' => 'required|unique:tags',
                'color' => 'required',
            ]
        );

        $tag = Tag::create($request->all());
        return redirect()->route('tags.edit', compact('tag'))->with('info', 'Etiqueta creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('tags.show', compact($tag));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $colors = [
            'red' => 'rojo',
            'green' => 'verde',
            'blue' => 'azul',
            'yellow' => 'amarillo',
            'purple' => 'morado',
            'orange' => 'naranja',
            'pink' => 'rosado',
            'brown' => 'cafe',
        ];

        return view('tags.edit', compact('tag', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Tag $tag)
    {
        $request->validate(
            [
                'name' => 'required',
                'slug' => "required|unique:tags,slug,$tag->id",
                'color' => 'required',
            ]
        );

        $tag->update($request->all());
        return redirect()->route('tags.edit', $tag)->with('info', 'Etiqueta actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index', $tag)->with('info', 'Etiqueta eliminada con éxito');
    }
}

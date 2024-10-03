<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'colors'];

    // Sobrescribe getRouteKeyName para usar el slug en lugar del id en las rutas
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Relación muchos a muchos con posts
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}

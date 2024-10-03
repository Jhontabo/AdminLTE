<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // Sobrescribe getRouteKeyName para usar el slug en lugar del id en las rutas
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Relación uno a muchos con posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

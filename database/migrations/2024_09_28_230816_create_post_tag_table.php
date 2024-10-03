<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id'); // Clave foránea para la tabla posts
            $table->unsignedBigInteger('tag_id');  // Clave foránea para la tabla tags

            // Definir claves foráneas
            $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
            $table->foreign('tag_id')->references('id')->on('tags')->cascadeOnDelete();

            // Definir una clave primaria compuesta (post_id y tag_id)
            $table->primary(['post_id', 'tag_id']);

            $table->timestamps();  // Timestamps opcionales, pero útiles para registrar la fecha de creación/modificación
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};

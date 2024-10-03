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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();  // Aseguramos que el slug sea único
            $table->text('extract')->nullable();  // Permitir null si no quieres un valor por defecto
            $table->longText('body');
            $table->enum('status', [1, 2])->default(1);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');

            // Claves foráneas con eliminación en cascada
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

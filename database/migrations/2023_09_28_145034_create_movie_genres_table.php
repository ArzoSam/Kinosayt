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
        Schema::create('movie_genres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('genre_id');
            $table->timestamps();

            $table->index('movie_id', 'movie_genre_movie_idx');
            $table->index('genre_id', 'movie_genre_genre_idx');

            $table->foreign('movie_id', 'movie_genre_movie_fk')->on('movies')->references('id');
            $table->foreign('genre_id', 'movie_genre_genre_fk')->on('genres')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_genres');
    }
};

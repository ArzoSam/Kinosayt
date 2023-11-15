<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            'movie_actors',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('movie_id');
                $table->unsignedBigInteger('actor_id');
                $table->timestamps();

                $table->index('movie_id', 'movie_actor_movie_idx');
                $table->index('actor_id', 'movie_actor_actor_idx');

                $table->foreign('movie_id', 'movie_actor_movie_fk')->on('movies')->references('id');
                $table->foreign('actor_id', 'movie_actor_actor_fk')->on('actors')->references('id');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_actors');
    }
};

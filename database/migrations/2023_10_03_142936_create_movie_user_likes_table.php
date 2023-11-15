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
            'movie_user_likes',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('movie_id');
                $table->unsignedBigInteger('user_id');
                $table->timestamps();

                $table->index('movie_id', 'pul_movie_idx');
                $table->index('user_id', 'pul_user_idx');

                $table->foreign('movie_id', 'pul_movie_fk')->on('movies')->references('id');
                $table->foreign('user_id', 'pul_user_fk')->on('users')->references('id');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_user_likes');
    }
};

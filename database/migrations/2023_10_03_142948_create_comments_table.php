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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('movie_id');
            $table->text('message');
            $table->timestamps();

            $table->index('movie_id', 'comment_movie_idx');
            $table->index('user_id', 'comment_user_idx');

            $table->foreign('movie_id', 'comment_movie_fk')->on('movies')->references('id');
            $table->foreign('user_id', 'comment_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

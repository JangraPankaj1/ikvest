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
            $table->unsignedBigInteger('user_id'); // Assuming the user ID column is unsigned
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Adjust 'user

            $table->unsignedBigInteger('post_id'); // Assuming the user ID column is unsigned
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade'); // Adjust 'user
            $table->text('comment')->nullable();
            $table->text('image')->nullable();
            $table->text('image_path')->nullable();

            $table->timestamps();
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

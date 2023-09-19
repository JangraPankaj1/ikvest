<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
     {
            Schema::create('investments_docs', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id'); // Assuming the user ID column is unsigned
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Adjust 'user
                $table->text('description');
                $table->text('docs')->nullable();
                $table->text('docs_path')->nullable();
                $table->text('video_link')->nullable();
                $table->text('video_type')->nullable();
                $table->timestamps();
            });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investments_docs');
    }
};

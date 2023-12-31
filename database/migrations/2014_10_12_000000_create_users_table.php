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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('role')->nullable();
            $table->text('profile_pic')->nullable();
            $table->text('image_path')->nullable();

            $table->string('parent_id')->nullable();
            $table->string('head_family_id')->nullable();

            $table->string('marital_status')->nullable();
            $table->string('phone')->nullable();
            $table->string('current_spouse')->nullable();
            $table->text('description')->nullable();

            $table->string('bdy_date')->nullable();
            $table->string('mrg_date')->nullable();

            $table->string('social_id')->nullable();
            $table->string('social_type')->nullable();
            $table->boolean('status')->nullable()->default(false);

            $table->string('email')->unique();
            $table->integer('is_verified')->default(0);
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

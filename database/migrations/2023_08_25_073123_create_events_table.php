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

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Assuming the user ID column is unsigned
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Adjust 'users' to the actual users table name
            $table->string('event_created_by');
            $table->string('event_name');
            $table->text('description')->nullable(); // Use text for longer descriptions
            $table->string('place')->nullable();
            $table->text('date_time')->nullable(); // Use dateTime for date and time values
                 
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
        Schema::dropIfExists('events');
    }
};

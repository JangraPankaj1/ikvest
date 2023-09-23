<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBirthdayAnniversaryUserToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Remove foreign key constraints temporarily
        Schema::disableForeignKeyConstraints();

        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('birthday_user')->nullable()->after('post_message'); // Add the new column after 'post_message'
            $table->unsignedBigInteger('anniversary_user')->nullable()->after('birthday_user'); // Add the new column after 'birthday_user'
        });

        // Re-add foreign key constraints
        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('birthday_user')->references('id')->on('users'); // Add foreign key constraint
            $table->foreign('anniversary_user')->references('id')->on('users'); // Add foreign key constraint
        });

        // Re-enable foreign key constraints
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
     {
        // Remove foreign key constraints temporarily
        Schema::disableForeignKeyConstraints();

        Schema::table('posts', function (Blueprint $table) {
            // Rollback: remove the columns
            $table->dropColumn('birthday_user');
            $table->dropColumn('anniversary_user');
        });

        // Re-enable foreign key constraints
        Schema::enableForeignKeyConstraints();
    }
}

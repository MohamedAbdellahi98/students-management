<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->boolean('deleted_by_sender')->default(false);
            $table->boolean('deleted_by_receiver')->default(false);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn(['deleted_by_sender', 'deleted_by_receiver']);
        });
    }

};

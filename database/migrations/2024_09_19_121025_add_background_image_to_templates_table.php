<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBackgroundImageToTemplatesTable extends Migration
{
    public function up()
    {
        Schema::table('templates', function (Blueprint $table) {
            $table->string('background_image')->nullable(); // Add the column
        });
    }

    public function down()
    {
        Schema::table('templates', function (Blueprint $table) {
            $table->dropColumn('background_image'); // Rollback the column
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('name');  // Name of the certificate holder
            $table->string('surname');  // Surname of the certificate holder
            $table->string('id_number');  // ID number of the certificate holder
            $table->foreignId('template_id')->constrained()->onDelete('cascade');  // Foreign key to templates table
            $table->string('pdf_path')->nullable();  // Path to the generated PDF file
            $table->timestamps();  // created_at and updated_at fields
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}

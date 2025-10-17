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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('std_name')->nullable(); 
            $table->integer('std_age')->nullable();
            $table->string('std_email')->unique();
            $table->string('std_phone')->unique();
            $table->string('std_gender')->nullable();
            $table->unsignedbigInteger('std_dpt');
            $table->string('std_level');
            $table->timestamps();
            $table->foreign('std_dpt')->references('id')->on('departments')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

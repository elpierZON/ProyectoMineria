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
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->integer('dni')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->enum('gender', ['Masculino', 'Femenino'])->nullable();




            $table->unsignedBigInteger('id_rol');
            // Foreign key
            $table->foreign('id_rol')->references('id')->on('rol')->onDelete('cascade');

            $table->timestamps();
        });

    }


    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};

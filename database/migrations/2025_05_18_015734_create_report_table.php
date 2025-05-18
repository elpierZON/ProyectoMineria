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
        Schema::create('report', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // id_usuario
            $table->unsignedBigInteger('area_id'); // id_area
            $table->string('title', 100)->nullable();
            $table->text('description')->nullable();
            $table->string('report_type', 50)->nullable();
            $table->text('photo_evidence')->nullable();
            $table->enum('status', ['Pendiente', 'Revisado', 'Completado'])->default('Pendiente');

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('area_id')->references('id')->on('area')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report');
    }
};

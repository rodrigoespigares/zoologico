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
        Schema::create('visitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('guia_id');
            $table->date("fecha_visita");
            $table->boolean("cancelado")->default(false);
            $table->integer("n_entradas");
            $table->unsignedBigInteger('ruta_id')->nullable(false);
            $table->timestamps();
            $table->foreign('ruta_id')->references('id')->on('ruta');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('guia_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitas');
    }
};

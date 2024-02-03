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
        Schema::create('guia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guia_id');
            $table->integer('n_clientes');
            $table->integer('disponibles');
            $table->timestamps();
            $table->foreign('guia_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guia');
    }
};

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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offre_id');
            $table->unsignedBigInteger('id_Transitaire');
            $table->string('status')->default('attente');
            $table->string('Nombre_de_tickets')->nullable();
            $table->float('prixTotal',10,5)->nullable();
            $table->timestamps();
            $table->foreign('offre_id')->references('id')->on('offres');
            $table->foreign('id_Transitaire')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};

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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->enum('typeContact', ['professionnel', 'particulier']);
            $table->string('prenom');
            $table->string('nom');
            $table->string('raisonSociale')->nullable();
            $table->string('ice')->nullable();
            $table->text('adresse');
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email');
            $table->string('typeDemande');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};

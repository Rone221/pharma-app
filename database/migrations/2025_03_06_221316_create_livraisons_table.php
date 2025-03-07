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
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('IdFournisseur')->constrained('fournisseurs')->onDelete('cascade');
            $table->foreignId('idproduit')->constrained('produits')->onDelete('cascade');
            $table->date('date');
            $table->integer('quant');
            $table->timestamps();

            // Définition des clés étrangères avec les noms actuels
            $table->foreign('IdFournisseur')->references('IdFounisseur')->on('fournisseurs')->onDelete('cascade');
            $table->foreign('idproduit')->references('idproduit')->on('produits')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraisons');
    }
};

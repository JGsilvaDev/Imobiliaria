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
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->string('finalidade');
            $table->unsignedFloat('valor');
            $table->string('nome');
            $table->string('email');
            $table->string('telefone');
            $table->string('tpImovel');
            $table->string('condominio');
            $table->string('endereco');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('observacao', 5000);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

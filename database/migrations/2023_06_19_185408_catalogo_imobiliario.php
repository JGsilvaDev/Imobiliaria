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
        Schema::create('catalogos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tp_produto');
            $table->unsignedBigInteger('id_cliente');
            $table->string('titulo');
            $table->string('descricao');
            $table->float('area');
            $table->float('valor');
            $table->string('imagens');
            $table->timestamps();

            $table->foreign('id_tp_produto')->references('id')->on('produtos')->onDelete('cascade');
            $table->foreign('id_cliente')->references('id')->on('users')->onDelete('cascade');

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

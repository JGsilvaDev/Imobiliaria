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
            $table->decimal('area',12,3);
            $table->decimal('valor',12,3);
            $table->string('localidade');
            $table->timestamps();

            $table->foreign('id_tp_produto')->references('id')->on('produtos')->onDelete('cascade');
            $table->foreign('id_cliente')->references('id')->on('usuarios')->onDelete('cascade');

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

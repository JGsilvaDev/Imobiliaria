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
            $table->string('descricao', 5000);
            $table->integer('qtdBanheiros')->nullable();
            $table->integer('qtdSuites')->nullable();
            $table->integer('qtdQuartos')->nullable();
            $table->integer('qtdGaragemCobertas')->nullable();
            $table->integer('qtdGaragemNaoCobertas')->nullable();
            $table->unsignedBigInteger('area');
            $table->unsignedBigInteger('areaUtil')->nullable();
            $table->unsignedBigInteger('areaTerreno')->nullable();
            $table->unsignedFloat('areaConstruida')->nullable();
            $table->unsignedFloat('valor');
            $table->unsignedFloat('valorCondominio')->nullable();
            $table->unsignedFloat('iptuMensal');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('ruaNumero');
            $table->string('cep')->nullable();
            $table->string('tp_contrato');
            $table->boolean('agua');
            $table->boolean('energia');
            $table->boolean('esgoto');
            $table->boolean('murado');
            $table->boolean('pavimentação');
            $table->boolean('areaServico');
            $table->boolean('banheiroAuxiliar');
            $table->boolean('banheiroEmpregada');
            $table->boolean('cozinha');
            $table->boolean('cozinhaPlanejada');
            $table->boolean('despensa');
            $table->boolean('lavanderias');
            $table->boolean('guarita');
            $table->boolean('portaria24h');
            $table->boolean('areaLazer');
            $table->boolean('churrasqueira');
            $table->boolean('playground');
            $table->boolean('quadra');
            $table->boolean('varanda');
            $table->boolean('varandaGourmet');
            $table->boolean('lavado');
            $table->boolean('roupeiro');
            $table->boolean('suiteMaster');
            $table->boolean('closet');
            $table->boolean('pisoFrio');
            $table->boolean('porcelanato');
            $table->boolean('entradaServico');
            $table->boolean('escritorio');
            $table->boolean('jardim');
            $table->boolean('moveisPlanejados');
            $table->boolean('portaoEletronico');
            $table->boolean('quintal');
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

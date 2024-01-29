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
            $table->string('cod_imovel');
            $table->unsignedBigInteger('id_tp_produto');
            $table->unsignedBigInteger('id_cliente');
            $table->string('titulo', 2500);
            $table->string('descricao', 10000);
            $table->integer('qtdBanheiros')->nullable();
            $table->integer('qtdSuites')->nullable();
            $table->integer('qtdQuartos')->nullable();
            $table->integer('qtdGaragemCobertas')->nullable();
            $table->integer('qtdGaragemNaoCobertas')->nullable();
            $table->integer('qtdSacadasCobertas')->nullable();
            $table->unsignedBigInteger('area');
            $table->unsignedBigInteger('areaUtil')->nullable();
            $table->unsignedBigInteger('areaTerreno')->nullable();
            $table->unsignedFloat('areaConstruida')->nullable();
            $table->unsignedFloat('valor');
            $table->unsignedFloat('valorCondominio')->nullable();
            $table->unsignedFloat('iptuMensal')->nullable();
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
            $table->boolean('gasEncanado');
            $table->boolean('banheiroEmpregada');
            $table->boolean('cozinha');
            $table->boolean('cozinhaPlanejada');
            $table->boolean('despensa');
            $table->boolean('lavanderias');
            $table->boolean('guarita');
            $table->boolean('portaria24h');
            $table->boolean('areaLazer');
            $table->boolean('churrasqueira');
            $table->boolean('churrasqueiraCondominio');
            $table->boolean('playground');
            $table->boolean('quadra');
            $table->boolean('varanda');
            $table->boolean('varandaGourmet');
            $table->boolean('sacadaGourmet');
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
            $table->boolean('cozinhaConjugada');
            $table->boolean('porteiroEletronico');
            $table->boolean('tvCabo');
            $table->boolean('arCondicionado');
            $table->boolean('alarme');
            $table->boolean('aguaSolar');
            $table->boolean('mobiliado');
            $table->boolean('depEmpregados');
            $table->boolean('lareira');
            $table->boolean('caseiro');
            $table->boolean('edicula');
            $table->boolean('piscina');
            $table->boolean('piscinaCondominio');
            $table->boolean('terraco');
            $table->boolean('hidromassagem');
            $table->boolean('jardimInverno');
            $table->boolean('pisoAquecido');
            $table->boolean('pisoArdosia');
            $table->boolean('pisoBioquete');
            $table->boolean('pisoCarpete');
            $table->boolean('pisoCeramica');
            $table->boolean('pisoCimentoQueimado');
            $table->boolean('pisoEmborrachado');
            $table->boolean('pisoTacoMadeira');
            $table->boolean('contraPiso');
            $table->boolean('pisoTabua');            
            $table->boolean('granito');
            $table->boolean('marmore');
            $table->boolean('armarioCozinha');
            $table->boolean('armarioCorredor');
            $table->boolean('armarioCloset');
            $table->boolean('armarioQuarto');
            $table->boolean('armarioBanheiro');
            $table->boolean('armarioSala');
            $table->boolean('armarioEscritorio');
            $table->boolean('armarioDepEmp');
            $table->boolean('armarioAreaServico');
            $table->boolean('salaCinema');
            $table->boolean('adega');
            $table->boolean('sauna');
            $table->boolean('campFut');
            $table->boolean('salaJogos');
            $table->boolean('salaFestas');
            $table->boolean('salaGinastica');
            $table->boolean('estacionamentoVisita');

            $table->text('extraInfo', 3000)->nullable();
            $table->integer('qtdSalas')->nullable();
            $table->integer('qtdDorms')->nullable();
            
            $table->text('vendidoAlugado')->nullable();
            


            // Opções do terreno
                        
            $table->unsignedFloat('metragemFrente')->nullable();
            $table->unsignedFloat('metragemFundo')->nullable();
            $table->unsignedFloat('metragemDireita')->nullable();
            $table->unsignedFloat('metragemEsquerda')->nullable();
            $table->text('posTerreno',500)->nullable();
            $table->text('formaTerreno',500)->nullable();
            $table->text('vegetacao',500)->nullable();
            $table->text('protecao',500)->nullable();
            $table->text('topografia',500)->nullable();
            $table->boolean('acessoEnergia')->nullable();
            $table->boolean('escola')->nullable();
            $table->boolean('comercio')->nullable();
            
            // Opções do comércio
            
            $table->string('tipoComercio',500)->nullable();
            $table->boolean('elevador');
            $table->boolean('copa');
            $table->boolean('recepcao');
            $table->boolean('mesanino');
            $table->boolean('luminarias');
            $table->boolean('acessoDeficiente');
            $table->boolean('geradorEnergia');
            $table->boolean('telefonia');
            $table->boolean('rede');


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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class imoveisController extends Controller
{
    public function index(){
        $search = session('search');
        $nItens = session('nItens');

        $imoveis = DB::table('catalogos')
                ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                ->select('catalogos.id','catalogos.titulo','catalogos.cidade','catalogos.bairro','catalogos.ruaNumero','catalogos.cep','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdGaragemCobertas','catalogos.qtdGaragemNaoCobertas','catalogos.qtdQuartos','catalogos.vendidoAlugado','catalogos.qtdSacadasCobertas','catalogos.sacadaGourmet');

        $filtro = new \stdClass();

        // dd($search);

        if($search and $search != 'sem filtro' and $search != null){

            $titulo = $search[0]->titulo;
            $cidade = $search[0]->cidade;
            $quartos = $search[0]->quartos;
            $banheiros = $search[0]->banheiros;
            $vagas = $search[0]->vagas;
            $area = $search[0]->area;
            $valor = $search[0]->valor;

            if ($titulo != null) {
                $imoveis->where('catalogos.titulo', 'like','%'.$titulo.'%');

                $filtro->titulo[] = 'titulo';
                $filtro->titulo[] = $titulo;

            }

            if ($cidade != null) {
                $imoveis->where('catalogos.cidade', 'like','%'.$cidade.'%');

                $filtro->cidade[] = 'localidade';
                $filtro->cidade[] = $cidade;

            }

            if ($banheiros != 3 and $banheiros != null) {
                $imoveis->where('catalogos.qtdBanheiros', '=', $banheiros);

                $filtro->banheiros[] = 'banheiros';
                $filtro->banheiros[] = $banheiros;
            }

            if ($banheiros == 3 and $banheiros != null) {
                $imoveis->where('catalogos.qtdBanheiros', '>', 3);

                $filtro->banheiros[] = 'banheiros';
                $filtro->banheiros[] = $banheiros;
            }

            if ($quartos != 3 and $quartos != null) {
                $imoveis->where('catalogos.qtdQuartos', '=', $quartos);

                $filtro->quartos[] = 'quartos';
                $filtro->quartos[] = $quartos;
            }

            if ($quartos == 3 and $quartos != null) {
                $imoveis->where('catalogos.qtdQuartos', '>', 3);

                $filtro->quartos[] = 'quartos';
                $filtro->quartos[] = $quartos;
            }

            if ($vagas != 3 and $vagas != null) {
                $imoveis->where('catalogos.qtdGaragemCobertas', '=', $vagas);

                $filtro->vagas[] = 'vagas';
                $filtro->vagas[] = $vagas;
            }

            if ($vagas == 3 and $vagas != null) {
                $imoveis->where('catalogos.qtdGaragemCobertas', '>', 3);

                $filtro->vagas[] = 'vagas';
                $filtro->vagas[] = $vagas;
            }

            if($valor == 1 and $valor != null){
                $imoveis->where('catalogos.valor','<',100000);

                $filtro->valor[] = 'valor';
                $filtro->valor[] = 'Até R$100.000';
            }

            if($valor == 2 and $valor != null){
                $imoveis->whereBetween('catalogos.valor',[100000, 300000]);

                $filtro->valor[] = 'valor';
                $filtro->valor[] = 'Entre R$100.000 e R$ 300.000';
            }

            if($valor == 3 and $valor != null){
                $imoveis->where('catalogos.valor','>',300000);

                $filtro->valor[] = 'valor';
                $filtro->valor[] = 'Acima de R$ 300.000';
            }

            if($area == 1 and $area != null){
                $imoveis->where('catalogos.area','<',150);

                $filtro->area[] = 'area';
                $filtro->area[] = 'Até 150m²';
            }

            if($area == 2 and $area != null){
                $imoveis->whereBetween('catalogos.area',[150, 250]);

                $filtro->area[] = 'area';
                $filtro->area[] = 'Entre 150m² e 250m²';
            }

            if($area == 3 and $area != null){
                $imoveis->where('catalogos.area','>',250);

                $filtro->area[] = 'area';
                $filtro->area[] = 'Acima de 250m²';
            }

        }

        if($nItens == null){
            $imoveis->limit(9);
        }else{
            $first = session('first');
            $first = 1;

            if($first == 1){
                $imoveis->limit(18);
                $first = 0;
            }else{
                $imoveis->limit($nItens);
            }
        }

        // dd($nItens);

        $imoveis = $imoveis->get();

        $imagem = DB::table('imagens_principais')
                    ->select('chave','path')
                    ->get();

        if($imoveis->isEmpty()){
            $imagem = new \stdClass();

            $imagem->id = 0;
        }

        // Session::forget('nItens');

        return view('imoveis.home',['imoveis' => $imoveis, 'imagens' => $imagem, 'filtro' => $filtro]);
    }

    public function search(Request $request){

        $session = session();

        if(
           $request->titulo != null or $request->cidade != null or
           $request->qtdQuartos != null or $request->qtdBanheiros != null or
           $request->vagas != null or $request->valor != null or $request->area != null
        ){

            $search = [
                (object) [
                    'titulo' => $request->titulo,
                    'localidade' => $request->cidade,
                    'quartos' => $request->qtdQuartos,
                    'banheiros' => $request->qtdBanheiros,
                    'vagas' => $request->vagas,
                    'valor' => $request->valor,
                    'area' => $request->area
                ],
            ];

            $session->put([
                'search' => $search
            ]);

        }else{

            $session->put([
                'search' => 'sem filtro'
            ]);
        }

        Session::forget('nItens');

        return redirect()->back();
    }

    public function detalhe($id){

        $item =  DB::table('catalogos')
                    ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                    ->select('catalogos.id','catalogos.cod_imovel','catalogos.descricao as desc','catalogos.id_tp_produto',
                      'catalogos.qtdBanheiros','catalogos.qtdGaragemCobertas','catalogos.qtdGaragemNaoCobertas','catalogos.qtdQuartos','catalogos.titulo',
                      'catalogos.cidade','catalogos.bairro','catalogos.ruaNumero','catalogos.cep','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdSuites',
                      'catalogos.areaUtil','catalogos.areaTerreno','catalogos.areaConstruida','catalogos.valorCondominio',
                      'catalogos.iptuMensal','catalogos.agua','catalogos.energia','catalogos.esgoto','catalogos.murado',
                      'catalogos.pavimentação','catalogos.areaServico','catalogos.gasEncanado','catalogos.banheiroEmpregada',
                      'catalogos.cozinha','catalogos.cozinhaPlanejada','catalogos.despensa','catalogos..lavanderias',
                      'catalogos.guarita','catalogos.portaria24h','catalogos.areaLazer','catalogos.churrasqueira','catalogos.churrasqueiraCondominio',
                      'catalogos.playground','catalogos.quadra','catalogos.varanda','catalogos.varandaGourmet',
                      'catalogos.lavado','catalogos.roupeiro','catalogos.suiteMaster','catalogos.closet','catalogos.pisoFrio',
                      'catalogos.porcelanato','catalogos.entradaServico','catalogos.jardim','catalogos.escritorio',
                      'catalogos.moveisPlanejados','catalogos.portaoEletronico','catalogos.quintal', 'catalogos.tp_contrato', 'catalogos.vendidoAlugado', 'catalogos.qtdSacadasCobertas', 'catalogos.cozinhaConjugada', 'catalogos.porteiroEletronico','catalogos.agua', 'catalogos.esgoto', 'catalogos.energia', 'catalogos.murado', 'catalogos.pavimentação', 'catalogos.qtdSacadasCobertas', 'catalogos.areaServico', 'catalogos.banheiroEmpregada', 'catalogos.cozinha', 'catalogos.cozinhaPlanejada', 'catalogos.despensa', 'catalogos.lavanderias', 'catalogos.guarita', 'catalogos.portaria24h', 'catalogos.areaLazer', 'catalogos.churrasqueira', 'catalogos.playground', 'catalogos.quadra', 'catalogos.varanda', 'catalogos.varandaGourmet', 'catalogos.cozinhaConjugada', 'catalogos.lavado', 'catalogos.roupeiro', 'catalogos.suiteMaster', 'catalogos.closet', 'catalogos.pisoFrio', 'catalogos.porcelanato', 'catalogos.entradaServico', 'catalogos.escritorio', 'catalogos.jardim', 'catalogos.moveisPlanejados', 'catalogos.portaoEletronico', 'catalogos.porteiroEletronico', 'catalogos.quintal', 'catalogos.tvCabo', 'catalogos.arCondicionado', 'catalogos.alarme', 'catalogos.aguaSolar', 'catalogos.mobiliado', 'catalogos.depEmpregados', 'catalogos.lareira', 'catalogos.caseiro', 'catalogos.edicula', 'catalogos.piscina', 'catalogos.piscinaCondominio', 'catalogos.terraco', 'catalogos.hidromassagem', 'catalogos.jardimInverno', 'catalogos.pisoAquecido', 'catalogos.pisoArdosia', 'catalogos.pisoBioquete', 'catalogos.pisoCarpete', 'catalogos.pisoCeramica', 'catalogos.pisoCimentoQueimado', 'catalogos.pisoEmborrachado', 'catalogos.pisoTacoMadeira', 'catalogos.contraPiso', 'catalogos.pisoTabua', 'catalogos.granito', 'catalogos.marmore', 'catalogos.armarioCozinha', 'catalogos.armarioCorredor', 'catalogos.armarioCloset', 'catalogos.armarioQuarto', 'catalogos.armarioBanheiro', 'catalogos.armarioSala', 'catalogos.armarioEscritorio', 'catalogos.armarioDepEmp', 'catalogos.armarioAreaServico', 'catalogos.salaCinema', 'catalogos.adega', 'catalogos.sauna', 'catalogos.campFut', 'catalogos.salaJogos', 'catalogos.salaFestas', 'catalogos.salaGinastica', 'catalogos.estacionamentoVisita', 'catalogos.acessoEnergia', 'catalogos.escola', 'catalogos.comercio', 'catalogos.elevador', 'catalogos.copa', 'catalogos.recepcao', 'catalogos.mesanino', 'catalogos.luminarias', 'catalogos.acessoDeficiente', 'catalogos.geradorEnergia', 'catalogos.telefonia', 'catalogos.rede')
                    ->where('catalogos.id','=',$id)
                    ->first();

        $imagem = DB::table('imagens')
                    ->select('chave','path')
                    ->get();

        $imagemPrincipal = DB::table('imagens_principais')
                        ->select('chave','path')
                        ->get();

        $semelhante = DB::table('catalogos')
                    ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                    ->select('catalogos.id','catalogos.qtdBanheiros','catalogos.qtdGaragemCobertas','catalogos.qtdGaragemNaoCobertas','catalogos.qtdQuartos','catalogos.titulo','catalogos.cidade','catalogos.bairro','catalogos.ruaNumero','catalogos.cep','catalogos.area','catalogos.valor','produtos.descricao', 'vendidoAlugado')
                    ->where('catalogos.id','!=',$id)
                    ->where('produtos.descricao','=',$item->descricao)
                    ->limit(2)
                    ->get();

        if($semelhante->isEmpty()){
            $semelhante = '0';
        }

        // dd($semelhante);

        return view('imoveis/edit',['detalhes' => $item, 'imagens' => $imagem, 'imagemPrincipal' => $imagemPrincipal, 'semelhante' => $semelhante]);
    }

    public function maisItens(){

        Session::forget('session');

        $session = session();
        $nItens = session('nItens');

        $nItens += 9;

        $session->put([
            'nItens' => $nItens,
        ]);

        return redirect()->back();
    }
}

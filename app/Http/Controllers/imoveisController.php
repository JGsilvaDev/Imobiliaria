<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class imoveisController extends Controller
{
    public function index(){
        $search = session('search');
        $nItens = session('nItens');

        $imoveis = DB::table('catalogos')
                ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',);

        $filtro = new \stdClass();

        if($search and $search != 'sem filtro'){

            $titulo = $search[0]->titulo;
            $localidade = $search[0]->localidade;
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

            if ($localidade != null) {
                $imoveis->where('catalogos.localidade', 'like','%'.$localidade.'%');

                $filtro->localidade[] = 'localidade';
                $filtro->localidade[] = $localidade;

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
                $imoveis->where('catalogos.qtdVagas', '=', $vagas);

                $filtro->vagas[] = 'vagas';
                $filtro->vagas[] = $vagas;
            }

            if ($vagas == 3 and $vagas != null) {
                $imoveis->where('catalogos.qtdVagas', '>', 3);

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
            $imoveis->limit($nItens);
        }

        $imoveis = $imoveis->get();

        $imagem = DB::table('imagens_principais')
                    ->select('chave','path')
                    ->get();

        $opcoes = [
            (object) ['id' => 1, 'name' => 'Home','path' => '/admin'],
            (object) ['id' => 3, 'name' => 'Sair','path' => '/logout'],
        ];

        if($imoveis->isEmpty()){
            $imagem = new \stdClass();

            $imagem->id = 0;
        }

        // Session::forget('nItens');

        return view('imoveis.home',['imoveis' => $imoveis, 'imagens' => $imagem, 'opcoes' => $opcoes, 'filtro' => $filtro]);
    }

    public function search(Request $request){

        $session = session();

        if(
           $request->titulo != null or $request->localidade != null or
           $request->qtdQuartos != null or $request->qtdBanheiros != null or
           $request->vagas != null or $request->valor != null or $request->area != null
        ){

            $search = [
                (object) [
                    'titulo' => $request->titulo,
                    'localidade' => $request->localidade,
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
                    ->select('catalogos.id','catalogos.descricao as desc','catalogos.id_tp_produto',
                      'catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos','catalogos.titulo',
                      'catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdSuites',
                      'catalogos.areaUtil','catalogos.areaTerreno','catalogos.areaConstruida','catalogos.valorCondominio',
                      'catalogos.iptuMensal','catalogos.agua','catalogos.energia','catalogos.esgoto','catalogos.murado',
                      'catalogos.pavimentação','catalogos.areaServico','catalogos.banheiroAuxiliar','catalogos.banheiroEmpregada',
                      'catalogos.cozinha','catalogos.cozinhaPlanejada','catalogos.despensa','catalogos..lavanderias',
                      'catalogos.guarita','catalogos.portaria24h','catalogos.areaLazer','catalogos.churrasqueira',
                      'catalogos.playground','catalogos.quadra','catalogos.varanda','catalogos.varandaGourmet',
                      'catalogos.lavado','catalogos.roupeiro','catalogos.suiteMaster','catalogos.closet','catalogos.pisoFrio',
                      'catalogos.porcelanato','catalogos.entradaServico','catalogos.jardim','catalogos.escritorio',
                      'catalogos.moveisPlanejados','catalogos.portaoEletronico','catalogos.quintal', 'catalogos.tp_contrato')
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
                    ->select('catalogos.id','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao')
                    ->where('catalogos.id','!=',$id)
                    ->where('produtos.descricao','=',$item->descricao)
                    ->limit(2)
                    ->get();

        // dd($imagem);

        $opcoes = [
            (object) ['id' => 1, 'name' => 'Home','path' => '/admin'],
            (object) ['id' => 3, 'name' => 'Sair','path' => '/logout'],
        ];

        return view('imoveis/edit',['detalhes' => $item, 'imagens' => $imagem, 'imagemPrincipal' => $imagemPrincipal, 'semelhante' => $semelhante, 'opcoes' => $opcoes]);
    }

    public function maisItens(){

        $session = session();
        $nItens = session('nItens');

        $nItens += 9;

        $session->put([
            'nItens' => $nItens,
        ]);

        return redirect()->back();
    }
}

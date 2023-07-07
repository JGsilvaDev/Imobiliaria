<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class imoveisController extends Controller
{
    public function index(){
        $search = session('search');


        // dd($search[0]);

        if($search and $search != 'sem filtro'){

            $titulo = $search[0]->titulo;
            $localidade = $search[0]->localidade;
            $quartos = $search[0]->quartos;
            $banheiros = $search[0]->banheiros;
            $vagas = $search[0]->vagas;
            $area = $search[0]->area;
            $valor = $search[0]->valor;

            //------ TITULO ------
            //titulo
            if($titulo != null and $localidade == null and $quartos == null and $banheiros == null and $vagas == null and $area == null and $valor == null){
                $imoveis = DB::table('catalogos')
                    ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                    ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                    ->where('catalogos.titulo','LIKE',$titulo)
                    ->get();

            //titulo e localidade
            }else if($titulo != null and $localidade != null and $quartos == null and $banheiros == null and $vagas == null and $area == null and $valor == null){
                $imoveis = DB::table('catalogos')
                    ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                    ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                    ->where('catalogos.titulo','LIKE',$titulo)
                    ->where('catalogos.localidade','LIKE',$localidade)
                    ->get();

            //titulo, localidade e quartos
            }else if($titulo != null and $localidade != null and $quartos != null and $banheiros == null and $vagas == null and $area == null and $valor == null){

                if($quartos < 3){
                    $imoveis = DB::table('catalogos')
                        ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                        ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                        ->where('catalogos.titulo','LIKE', $titulo)
                        ->where('catalogos.localidade','LIKE', $localidade)
                        ->whereBetween('catalogos.qtdQuartos', [ 0, $quartos])
                        ->get();

                }else{
                    $imoveis = DB::table('catalogos')
                        ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                        ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                        ->where('catalogos.titulo','LIKE', $titulo)
                        ->where('catalogos.localidade','LIKE', $localidade)
                        ->where('catalogos.qtdQuartos', '>',$quartos)
                        ->get();
                }

            //titulo, localidade, quartos e banheiros
            }else if($titulo != null and $localidade != null and $quartos != null and $banheiros != null and $vagas == null and $area == null and $valor == null){

                if($quartos < 3 and $banheiros < 3){
                    $imoveis = DB::table('catalogos')
                        ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                        ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                        ->where('catalogos.titulo','LIKE', $titulo)
                        ->where('catalogos.localidade','LIKE', $localidade)
                        ->whereBetween('catalogos.qtdQuartos', [ 0, $quartos])
                        ->whereBetween('catalogos.qtdBanheiros', [ 0, $banheiros])
                        ->get();

                }else if($quartos < 3 and $banheiros >= 3){
                    $imoveis = DB::table('catalogos')
                        ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                        ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                        ->where('catalogos.titulo','LIKE', $titulo)
                        ->where('catalogos.localidade','LIKE', $localidade)
                        ->whereBetween('catalogos.qtdQuartos', [ 0, $quartos])
                        ->where('catalogos.qtdBanheiros','>', $banheiros)
                        ->get();

                }else if($quartos > 3 and $banheiros < 3){
                    $imoveis = DB::table('catalogos')
                        ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                        ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                        ->where('catalogos.titulo','LIKE', $titulo)
                        ->where('catalogos.localidade','LIKE', $localidade)
                        ->where('catalogos.qtdQuartos', '>',$quartos)
                        ->whereBetween('catalogos.qtdBanheiros', [ 0, $banheiros])
                        ->get();

                }else{
                    $imoveis = DB::table('catalogos')
                        ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                        ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                        ->where('catalogos.titulo','LIKE', $titulo)
                        ->where('catalogos.localidade','LIKE', $localidade)
                        ->where('catalogos.qtdQuartos', '>',$quartos)
                        ->where('catalogos.qtdBanheiros','>', $banheiros)
                        ->get();
                }

            //titulo, localidade, quartos, banheiros e vagas
            }else if($titulo != null and $localidade != null and $quartos != null and $banheiros != null and $vagas != null and $area == null and $valor == null){

                if($quartos < 3 and $banheiros < 3 and $vagas < 3){
                    $imoveis = DB::table('catalogos')
                        ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                        ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                        ->where('catalogos.titulo','LIKE', $titulo)
                        ->where('catalogos.localidade','LIKE', $localidade)
                        ->whereBetween('catalogos.qtdQuartos', [ 0, $quartos])
                        ->whereBetween('catalogos.qtdBanheiros', [ 0, $banheiros])
                        ->whereBetween('catalogos.qtdVagas', [ 0, $vagas])
                        ->get();

                }else if($quartos < 3 and $banheiros >= 3){
                    if($vagas < 3){
                        $imoveis = DB::table('catalogos')
                            ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                            ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                            ->where('catalogos.titulo','LIKE', $titulo)
                            ->where('catalogos.localidade','LIKE', $localidade)
                            ->whereBetween('catalogos.qtdQuartos', [ 0, $quartos])
                            ->where('catalogos.qtdBanheiros','>', $banheiros)
                            ->whereBetween('catalogos.qtdVagas', [ 0, $vagas])
                            ->get();

                    }else{
                        $imoveis = DB::table('catalogos')
                            ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                            ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                            ->where('catalogos.titulo','LIKE', $titulo)
                            ->where('catalogos.localidade','LIKE', $localidade)
                            ->whereBetween('catalogos.qtdQuartos', [ 0, $quartos])
                            ->where('catalogos.qtdBanheiros','>', $banheiros)
                            ->where('catalogos.qtdVagas','>', $vagas)
                            ->get();
                    }

                }else if($quartos > 3 and $banheiros < 3){
                    if($vagas < 3){
                        $imoveis = DB::table('catalogos')
                            ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                            ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                            ->where('catalogos.titulo','LIKE', $titulo)
                            ->where('catalogos.localidade','LIKE', $localidade)
                            ->where('catalogos.qtdQuartos', '>',$quartos)
                            ->whereBetween('catalogos.qtdBanheiros', [ 0, $banheiros])
                            ->whereBetween('catalogos.qtdVagas', [ 0, $vagas])
                            ->get();
                    }else{
                        $imoveis = DB::table('catalogos')
                            ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                            ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                            ->where('catalogos.titulo','LIKE', $titulo)
                            ->where('catalogos.localidade','LIKE', $localidade)
                            ->where('catalogos.qtdQuartos', '>',$quartos)
                            ->whereBetween('catalogos.qtdBanheiros', [ 0, $banheiros])
                            ->where('catalogos.qtdVagas','>', $vagas)
                            ->get();
                    }

                }else{
                    $imoveis = DB::table('catalogos')
                        ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                        ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                        ->where('catalogos.titulo','LIKE', $titulo)
                        ->where('catalogos.localidade','LIKE', $localidade)
                        ->where('catalogos.qtdQuartos', '>',$quartos)
                        ->where('catalogos.qtdBanheiros','>', $banheiros)
                        ->where('catalogos.qtdVagas','>', $vagas)
                        ->get();
                }

            //titulo, localidade, quartos, banheiros, vagas e area
            }else if($titulo != null and $localidade != null and $quartos != null and $banheiros != null and $vagas != null and $area != null and $valor == null){

                if($area == 1 ){
                    $imoveis = DB::table('catalogos')
                        ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                        ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                        ->where('catalogos.titulo','LIKE', $titulo)
                        ->where('catalogos.localidade','LIKE', $localidade)
                        ->where('catalogos.qtdQuartos','=', $quartos)
                        ->where('catalogos.qtdBanheiros','=', $banheiros)
                        ->where('catalogos.qtdVagas','=', $vagas)
                        ->whereBetween('catalogos.area', [ 0, 150])
                        ->get();

                }else if($area == 2){
                    $imoveis = DB::table('catalogos')
                        ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                        ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                        ->where('catalogos.titulo','LIKE', $titulo)
                        ->where('catalogos.localidade','LIKE', $localidade)
                        ->where('catalogos.qtdQuartos','=', $quartos)
                        ->where('catalogos.qtdBanheiros','=', $banheiros)
                        ->where('catalogos.qtdVagas','=', $vagas)
                        ->whereBetween('catalogos.area', [ 150, 250])
                        ->get();
                }else{
                    $imoveis = DB::table('catalogos')
                        ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                        ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                        ->where('catalogos.titulo','LIKE', $titulo)
                        ->where('catalogos.localidade','LIKE', $localidade)
                        ->where('catalogos.qtdQuartos','=', $quartos)
                        ->where('catalogos.qtdBanheiros','=', $banheiros)
                        ->where('catalogos.qtdVagas','=', $vagas)
                        ->where('catalogos.area','>', 250)
                        ->get();
                }

            //titulo, localidade, quartos, banheiros, vagas, area e valor
            }else if($titulo != null and $localidade != null and $quartos != null and $banheiros != null and $vagas != null and $area != null and $valor != null){
               if($valor == 1){
                   $imoveis = DB::table('catalogos')
                       ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                       ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                       ->where('catalogos.titulo','LIKE', $titulo)
                       ->where('catalogos.localidade','LIKE', $localidade)
                       ->where('catalogos.qtdQuartos','=', $quartos)
                       ->where('catalogos.qtdBanheiros','=', $banheiros)
                       ->where('catalogos.qtdVagas','=', $vagas)
                       ->where('catalogos.area','=', $area)
                       ->whereBetween('catalogos.valor', [ 0, 100000])
                       ->get();

               }else if($valor == 2){
                    $imoveis = DB::table('catalogos')
                        ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                        ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                        ->where('catalogos.titulo','LIKE', $titulo)
                        ->where('catalogos.localidade','LIKE', $localidade)
                        ->where('catalogos.qtdQuartos','=', $quartos)
                        ->where('catalogos.qtdBanheiros','=', $banheiros)
                        ->where('catalogos.qtdVagas','=', $vagas)
                        ->where('catalogos.area','=', $area)
                        ->whereBetween('catalogos.valor', [ 100000, 300000])
                        ->get();
               }else{
                    $imoveis = DB::table('catalogos')
                        ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                        ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                        ->where('catalogos.titulo','LIKE', $titulo)
                        ->where('catalogos.localidade','LIKE', $localidade)
                        ->where('catalogos.qtdQuartos','=', $quartos)
                        ->where('catalogos.qtdBanheiros','=', $banheiros)
                        ->where('catalogos.qtdVagas','=', $vagas)
                        ->where('catalogos.area','=', $area)
                        ->where('catalogos.valor','>', 300000)
                        ->get();
               }

            }


        }else{
            $imoveis = DB::table('catalogos')
                ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos',)
                ->get();
        }

        $imagem = DB::table('imagens')
                    ->select('chave','path')
                    ->get();

        $opcoes = [
            (object) ['id' => 1, 'name' => 'Home','path' => '/admin'],
            (object) ['id' => 2, 'name' => 'Editar Perfil', 'path' => '/admin/editUsuario'],
            (object) ['id' => 3, 'name' => 'Sair','path' => '/logout'],
        ];

        if($imoveis->isEmpty()){
            $imagem = new \stdClass();

            $imagem->id = 0;
        }

        return view('imoveis.home',['imoveis' => $imoveis, 'imagens' => $imagem, 'opcoes' => $opcoes]);
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

        return redirect()->back();
    }

    public function detalhe($id){

        $item =  DB::table('catalogos')
                    ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                    ->select('catalogos.id','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao')
                    ->where('catalogos.id','=',$id)
                    ->first();

        $imagem = DB::table('imagens')
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
            (object) ['id' => 2, 'name' => 'Editar Perfil', 'path' => '/admin/editUsuario'],
            (object) ['id' => 3, 'name' => 'Sair','path' => '/logout'],
        ];

        return view('imoveis/edit',['detalhes' => $item, 'imagens' => $imagem, 'semelhante' => $semelhante, 'opcoes' => $opcoes]);
    }
}

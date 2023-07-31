<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Catalogo;
use App\Models\Contatos;

class masterController extends Controller
{
    public function index(){

        $catalogo = DB::table('catalogos')
                    ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                    ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos')
                    ->get();

        $imagem = DB::table('imagens_principais')
                    ->select('chave','path')
                    ->get();

        $count = Catalogo::count();

        $opcoes = [
            (object) ['id' => 1, 'name' => 'Home','path' => '/admin'],
            (object) ['id' => 3, 'name' => 'Sair','path' => '/logout'],
        ];

        return view('index',['itens' => $catalogo, 'imagens' => $imagem, 'opcoes' => $opcoes, 'count' => $count]);
    }

    public function store(Request $request){

        $tipo = strlen($request->infoPesquisa);

        if($tipo == 1){

            $imoveis = DB::table('catalogos')
                        ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                        ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos')
                        ->where('produtos.id','=',$request->infoPesquisa)
                        ->get();

            $imagem = DB::table('imagens')
                        ->select('chave','path')
                        ->get();

        }else{

            $imoveis = DB::table('catalogos')
                        ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                        ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos')
                        ->where('catalogos.titulo','like','%'.$request->infoPesquisa.'%')
                        ->get();

            $imagem = DB::table('imagens')
                        ->select('chave','path')
                        ->get();
        }

        $opcoes = [
            (object) ['id' => 1, 'name' => 'Home','path' => '/admin'],
            (object) ['id' => 3, 'name' => 'Sair','path' => '/logout'],
        ];

        return view('imoveis.home',['imoveis' => $imoveis, 'imagens' => $imagem,'opcoes' => $opcoes]);
    }

    public function sobre(){

        $opcoes = [
            (object) ['id' => 1, 'name' => 'Home','path' => '/admin'],
            (object) ['id' => 3, 'name' => 'Sair','path' => '/logout'],
        ];

        return view('sobre',['opcoes' => $opcoes]);
    }

    public function contato(){

        $opcoes = [
            (object) ['id' => 1, 'name' => 'Home','path' => '/admin'],
            (object) ['id' => 3, 'name' => 'Sair','path' => '/logout'],
        ];

        return view('contato',['opcoes' => $opcoes]);
    }

    public function envioContato(Request $request){

        $contatos =  new Contatos();

        $contatos->nome = $request->nome;
        $contatos->email = $request->email;
        $contatos->telefone = $request->telefone;
        $contatos->mensagem = $request->mensagem;
        $contatos->motivoContato = $request->motivo;
        $contatos->resolvido = false;

        $contatos->save();

        return redirect()->back();
    }
}

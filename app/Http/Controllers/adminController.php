<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Catalogo;
use App\Models\Imagens;

class adminController extends Controller
{
    public function index(){
        //Pegar valor da sessão
        $valor = session('login');
        $id_cliente = session('id');
        $search = session('search');

        $dadosUsuario = DB::table('usuarios')
                    ->select('id_permissao','name','email')
                    ->where('id', '=', $id_cliente)
                    ->first();


        if($dadosUsuario != null){
            if($dadosUsuario->id_permissao == 2){
                if($search){
                    $itens = DB::table('catalogos')
                                ->select('id','id_tp_produto','titulo','descricao','area','valor')
                                ->where('id_cliente', '=', $id_cliente)
                                ->where('titulo', 'like', $search)
                                ->get();

                }else{
                    $itens = DB::table('catalogos')
                                ->select('id','id_tp_produto','titulo','descricao','area','valor')
                                ->where('id_cliente', '=', $id_cliente)
                                ->get();
                }

                if($itens->isEmpty()){
                    $imagem = new \stdClass();
                    $imagem->chave = 0;

                }else{
                    $imagem = DB::table('imagens')
                                ->select('chave','path')
                                ->get();
                }

            }else{
                if($search){
                    $itens = DB::table('catalogos')
                                ->select('id','id_tp_produto','titulo','descricao','area','valor')
                                ->where('titulo', 'like', $search)
                                ->get();
                }else{
                    $itens = DB::table('catalogos')
                                    ->select('id','id_tp_produto','titulo','descricao','area','valor')
                                    ->get();
                }

                if($itens->isEmpty()){
                    $imagem = new \stdClass();
                    $imagem->chave = 0;

                }else{
                    $imagem = DB::table('imagens')
                                ->select('chave','path')
                                ->get();
                }

            }

            $opcoes = [
                (object) ['id' => 1, 'name' => 'Perfil', 'path' => '/admin/editUsuario'],
                (object) ['id' => 2, 'name' => 'Sair','path' => '/logout'],
            ];

            if($valor){
                return view('admin/home',['itens' => $itens, 'paths' => $imagem, 'usuario' => $dadosUsuario, 'opcoes' => $opcoes]);
            }else{
                //Para limpar a sessão
                session()->flush();
                return redirect('login');
            }
        }

        $itens = false;

        if($valor){
            return view('admin/home',['itens' => $itens]);
        }else{
            //Para limpar a sessão
            session()->flush();
            return redirect('login');
        }
    }

    public function item(){
        $valor = session('login');

        if($valor){
            return view('admin/cadastro');
        }else{
            //Para limpar a sessão
            session()->flush();
            return redirect('login');
        }
    }

    public function search(Request $request){
        $session = session();

        $session->put([
            'search' => $request->search
        ]);

        return redirect('admin');
    }

    public function store(Request $request){
        $valor = session('login');
        $id_cliente = session('id');

        if($valor){

            $catalogo = new Catalogo();

            $catalogo->id_tp_produto = $request->id_produto;
            $catalogo->id_cliente = $id_cliente;
            $catalogo->titulo = $request->titulo;
            $catalogo->descricao = $request->descricao;
            $catalogo->area = $request->area;
            $catalogo->valor = $request->valor;
            $catalogo->localidade = $request->localidade;

            if($request->id_produto != 1 ){
                $catalogo->qtdBanheiros = $request->qtd_banheiros;
                $catalogo->qtdQuartos = $request->qtd_quartos;
                $catalogo->qtdVagas = $request->qtd_vagas;
            }else{
                $catalogo->qtdBanheiros = 0;
                $catalogo->qtdQuartos = 0;
                $catalogo->qtdVagas = 0;
            }

            $catalogo->save();

            $folderName = $id_cliente.'_'.uniqid();

            for($i = 0; $i < count($request->allFiles()['imagem']); $i++){
                $file = $request->allFiles()['imagem'][$i];

                $fileName = $file->store('public/img/'. $folderName);

                $fileNameFormat = str_replace('public/img/','storage/img/',$fileName);

                $imagem = new Imagens();
                $imagem->chave = $catalogo->id;
                $imagem->path = $fileNameFormat;
                $imagem->save();
                unset($imagem);
            }

            if($request->id_produto == 1){
                $msg = 'Terreno cadastrado com sucesso';
            }elseif($request->id_produto == 2){
                $msg = 'Casa cadastrado com sucesso';
            }else{
                $msg = 'Apartamento cadastrado com sucesso';
            }

            session()->flash('success', $msg);

            return redirect('admin');
        }else{
            //Para limpar a sessão
            session()->flush();
            return redirect('login');
        }
    }

}

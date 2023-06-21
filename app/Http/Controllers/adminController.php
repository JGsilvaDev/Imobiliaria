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

        $dadosUsuario = DB::table('usuarios')
                    ->select('id_permissao','name','email')
                    ->where('id', '=', $id_cliente)
                    ->first();

        // dd($dadosUsuario);

        if($dadosUsuario != null){
            if($dadosUsuario->id_permissao == 2){
                $itens = DB::table('catalogos')
                            ->select('id_tp_produto','titulo','descricao','area','valor','imagens')
                            ->where('id_cliente', '=', $id_cliente)
                            ->get();
            }else{
                $itens = DB::table('catalogos')
                            ->select('id_tp_produto','titulo','descricao','area','valor','imagens')
                            ->get();
            }

            if($valor){
                return view('admin/home',['itens' => $itens]);
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

    public function store(Request $request){
        $valor = session('login');
        $id_cliente = session('id');

        $imagem = new Imagens();

        if($valor){

            $folderName = $id_cliente.'_'.uniqid();

            for($i = 0; $i < count($request->allFiles()['imagem']); $i++){
                $file = $request->allFiles()['imagem'][$i];

                $fileName = $file->store('public/img/'. $folderName);

                $imagem->id = $folderName;
                $imagem->path = $fileName;

                $imagem->save();
            }

            $imagens = DB::table('imagens')
                        ->select('path')
                        ->where('id', '=', $folderName)
                        ->get();

            // dd($imagens);

            $catalogo = new Catalogo();

            $catalogo->id_tp_produto = $request->id_produto;
            $catalogo->id_cliente = $id_cliente;
            $catalogo->titulo = $request->titulo;
            $catalogo->descricao = $request->descricao;
            $catalogo->area = $request->area;
            $catalogo->valor = $request->valor;
            $catalogo->imagens = $folderName;

            $catalogo->save();

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

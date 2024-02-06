<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Anuncio;


class anuncioController extends Controller
{
    public function index(){
        return view('anuncio');
    }

    public function store(Request $request){

        $anuncio = new Anuncio;

        $anuncio->finalidade = $request->finalidade;
        $anuncio->valor = $request->valor;
        $anuncio->nome = $request->nome;
        $anuncio->email = $request->email;
        $anuncio->telefone = $request->telefone;
        $anuncio->tpImovel = $request->tpImovel;
        $anuncio->condominio = $request->condominio;
        $anuncio->endereco = $request->endereco;
        $anuncio->bairro = $request->bairro;
        $anuncio->cidade = $request->cidade;
        $anuncio->observacao = $request->observacao;

        // dd($anuncio);

        $anuncio->save();

        return redirect("/anuncio");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Catalogo;
use App\Models\Contatos;
use Illuminate\Support\Facades\Session;

class masterController extends Controller
{
    public function index()
    {

        $catalogo = DB::table('catalogos')
            ->join('produtos', 'produtos.id', '=', 'catalogos.id_tp_produto')
            ->select('catalogos.id', 'catalogos.titulo', 'catalogos.cidade', 'catalogos.bairro', 'catalogos.ruaNumero', 'catalogos.cep', 'catalogos.area', 'catalogos.valor', 'produtos.descricao', 'catalogos.qtdBanheiros', 'catalogos.qtdGaragemCobertas', 'catalogos.qtdGaragemNaoCobertas', 'catalogos.qtdQuartos', 'catalogos.vendidoAlugado', 'catalogos.cod_imovel')
            ->get();

        $imagem = DB::table('imagens_principais')
            ->select('chave', 'path')
            ->get();

        $count = Catalogo::count();

        Session::forget('search');

        return view('index', ['itens' => $catalogo, 'imagens' => $imagem, 'count' => $count]);
    }

    public function store(Request $request)
    {

        $session = session();

        $filtro = new \stdClass();

        $imoveis = DB::table('catalogos')
            ->join('produtos', 'produtos.id', '=', 'catalogos.id_tp_produto')
            ->select('catalogos.id', 'catalogos.titulo', 'catalogos.cidade', 'catalogos.bairro', 'catalogos.ruaNumero', 'catalogos.cep', 'catalogos.area', 'catalogos.valor', 'catalogos.qtdBanheiros', 'catalogos.qtdQuartos', 'catalogos.vendidoAlugado', 'catalogos.tp_contrato', 'produtos.descricao', 'catalogos.cod_imovel')
            ->where('catalogos.tp_contrato', '=', $request->infoPesquisa)
            ->get();

        $imagem = DB::table('imagens')
            ->select('chave', 'path')
            ->get();

        $filtro->imovel[] = 'Tipo de contrato';
        
        if ($request->infoPesquisa == "Venda") {
            $filtro->imovel[] = 'Venda';
        } else {
            $filtro->imovel[] = 'Aluguel';
        }

        $search = [
            'search' => $request->infoPesquisa
        ];


        $session->put([
            'search' => $search
        ]);

        return view('imoveis.home', ['imoveis' => $imoveis, 'imagens' => $imagem, 'filtro' => $filtro]);
    }

    public function sobre()
    {
        return view('sobre');
    }

    public function contato()
    {
        return view('contato');
    }

    public function anuncio()
    {
        return view('anuncio');
    }

    public function polpriv()
    {
        return view('info.politica_privacidade');
    }

    public function termservice()
    {
        return view('info.termos_servico');
    }

    public function envioContato(Request $request)
    {

        $contatos =  new Contatos();

        $contatos->nome = $request->nome;
        $contatos->email = $request->email;
        $contatos->telefone = $request->telefone;
        $contatos->mensagem = $request->mensagem;
        $contatos->motivoContato = $request->motivo;
        $contatos->cod_imovel = $request->cod_imovel_form;
        $contatos->resolvido = false;

        $contatos->save();

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Clientes;

class clienteController extends Controller
{
    public function index(){

        $valor = session('login');
        $clientes = Clientes::all();

        if($valor){
            return view('cliente.index',['clientes' => $clientes]);
        }else{
            //Para limpar a sessão
            session()->flush();
            return redirect('login');
        }
    }

    public function store(Request $request){
        $valor = session('login');

        if($valor){

            $idImovel = $request->idImovel;

            $imoveis = DB::table('catalogos')
                    ->select('id')
                    ->where('id', '=', $idImovel)
                    ->first();

            // dd($imoveis);

            if($imoveis != null) {

                $clientes = new Clientes;

                $clientes->nome = $request->nome;
                $clientes->email = $request->email;
                $clientes->telefone = $request->telefone;
                $clientes->tp_cliente = $request->tp_cliente;
                $clientes->idImovel = $request->idImovel;

                $clientes->save();

                Session::flash('success', 'Cliente cadastrado com sucesso');
            }else{
                Session::flash('warning', 'O imovel com o id '.$idImovel.' não existe');
            }

            return redirect()->back();
        }
    }
}

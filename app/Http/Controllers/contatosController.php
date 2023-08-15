<?php

namespace App\Http\Controllers;

use App\Models\Contatos;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class contatosController extends Controller
{
    public function index(){

        $contatos = Contatos::all();

        $id_cliente = session('id');

        $dadosUsuario = DB::table('usuarios')
                    ->select('id_permissao','name','email')
                    ->where('id', '=', $id_cliente)
                    ->first();

        return view('admin/contatos',['contatos' => $contatos, 'usuario' => $dadosUsuario]);
    }

    public function store(Request $request){

        $contato = Contatos::findOrFail($request->solucionar);

        $contato->resolvido = true;
        $contato->save();

        return redirect()->back();

    }

    public function destroy(Request $request){

        $contato = Contatos::findOrFail($request->deletar);

        $contato->delete();

        return redirect()->back();
    }
}

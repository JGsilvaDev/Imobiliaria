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
}

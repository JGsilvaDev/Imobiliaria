<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class cadastroUsuarioController extends Controller
{
    public function index()
    {
        return view('login/cadastro');
    }

    public function store(Request $request)
    {
        $usuario = new Usuarios();

        $usuario->name = $request->nome;
        $usuario->email = $request->email;
        $usuario->password = md5($request->senha);
        $usuario->id_permissao =  2;

        $usuario->save();

        return redirect('/login');
    }
}

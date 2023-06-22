<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class cadastroUsuarioController extends Controller
{
    public function index()
    {
        $erro = session('erro_cadastro');

        if($erro){
            $erro = 0;
            session()->flush();
        }

        return view('login/cadastro',['erro' => $erro]);


    }

    public function store(Request $request)
    {
        $usuario = new Usuarios();

        if($request->senha == $request->confirmSenha){
            $usuario->name = $request->nome;
            $usuario->email = $request->email;
            $usuario->password = md5($request->senha);
            $usuario->id_permissao =  2;
            $usuario->telefone = trim($request->telefone);

            $usuario->save();

            return redirect('/login');
        }

        $session = session();

        $session->put([
            'erro_cadastro' => 'Senha e Confirmação de senha não batem'
        ]);

        return redirect()->back();
    }
}

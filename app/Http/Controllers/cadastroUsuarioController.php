<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class cadastroUsuarioController extends Controller
{
    public function index()
    {
        $erro = session('erro_cadastro');
        $logado = session('login');

        if($erro){
            $erro = 0;
            session()->flush();
        }

        if($logado){
            return view('login/cadastro',['erro' => $erro]);
        }

        return redirect('/');
    }

    public function store(Request $request)
    {
        $usuario = new Usuarios();

        if($request->senha != $request->confirmSenha){
            $session = session();

            $session->put([
                'erro_cadastro' => 'Senha e Confirmação de senha não batem'
            ]);

            return redirect()->back();
        }

        if($request->email != $request->email_conf){
            $session = session();

            $session->put([
                'erro_cadastro' => 'Email e confirmar email não batem'
            ]);

            return redirect()->back();
        }

        $usuario->name = $request->nome;
        $usuario->email = $request->email;
        $usuario->password = md5($request->senha);
        $usuario->id_permissao =  2;
        $usuario->telefone = trim($request->telefone);

        $usuario->save();

        return redirect('/admin');

    }
}

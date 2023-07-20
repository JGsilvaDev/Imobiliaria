<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class loginController extends Controller
{
    public function index()
    {
        $login = session('login');
        $erro = session('erro_login');

        if($login){
            return redirect('admin');
        }else{
            //Para limpar a sessão
            session()->flush();
            return view('login/login',['erro' => $erro]);
        }
    }

    public function auth(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'senha' => ['required'/*, Password::min(8)*/]
        ],[
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'E-mail inválido',
            'senha.required' => 'O campo senha é obrigatório',
            'senha.min' => 'Senha deve conter mais de 8 caracteres'
        ]);

        $dados = DB::table('usuarios')
                    ->select('id', 'name')
                    ->where('email', '=', $request->email)
                    ->where('password', '=', md5($request->senha))
                    ->first();

        if($dados != null){
            $session = session();

            $nomeReduzido = Str::before($dados->name,' ');

            $session->put([
                'id' => $dados->id,
                'name' => $nomeReduzido,
                'login' => true
            ]);

            return redirect('admin');

        }else{
            $session = session();

            $session->put([
                'erro_login' => 'Usuário e/ou Senha inválidos!'
            ]);

            return redirect()->back();
        }
    }
}

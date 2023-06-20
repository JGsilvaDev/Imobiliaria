<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;

class loginController extends Controller
{
    public function index()
    {
        $valor = session('login');

        if($valor){
            return redirect('admin');
        }else{
            //Para limpar a sessão
            session()->flush();
            return view('login/login');
        }
    }

    public function store(Request $request)
    {
        $dados = DB::table('users')
                    ->select('password')
                    ->where('email', '=', $request->email)
                    ->where('password', '=', $request->senha)
                    ->count();

        if($dados = 1){
            return view('admin/home');
        }

        return view('login/login',['erro' => 'login invalido']);

    }

    public function auth(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'senha' => ['required' /*Password::min(8)*/]
        ],[
            'email.required' => 'O campo email é obrigatório',
            'senha.required' => 'O campo senha é obrigatório',
        ]);

        $dados = DB::table('users')
                    ->select('id', 'name')
                    ->where('email', '=', $request->email)
                    ->first();

        $session = session();

        $session->put([
            'id' => $dados->id,
            'login' => true
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->senha])){
            return redirect('admin');
        }else{
            return redirect()->back()->with('danger', 'E-mail ou senha inválido');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class cadastroController extends Controller
{
    public function index()
    {
        return view('login/cadastro');
    }

    public function store(Request $request)
    {
        $usuario = new User();

        $usuario->name = $request->nome;
        $usuario->email = $request->email;
        $usuario->password = $request->senha;

        $usuario->save();

        return redirect('/login');
    }
}

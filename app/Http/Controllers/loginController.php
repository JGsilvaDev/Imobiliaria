<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index()
    {
        return view('login/login');
    }

    public function store(Request $request)
    {
        $dados = DB::table('users')
                    ->select('password')
                    ->where('email', '=', $request->email)
                    ->where('password', '=', $request->senha)
                    ->count();

        if($dados = 1){
            dd("deu bom");
        }

        dd("deu ruim");

    }
}

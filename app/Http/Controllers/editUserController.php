<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Str;

class editUserController extends Controller
{
    public function user(){
        $valor = session('login');
        $id_cliente = session('id');

        $usuario = Usuarios::findOrFail($id_cliente);

        $texto = $usuario->name;

        $palavras = Str::of($texto)->explode(' ');
        $primeiraLetraPrimeiraPalavra = Str::substr($palavras[0], 0, 1);
        $ultimaPalavra = $palavras->last();
        $primeiraLetraUltimaPalavra = Str::substr($ultimaPalavra, 0, 1);

        $letras = strtoupper($primeiraLetraPrimeiraPalavra.$primeiraLetraUltimaPalavra);

        if($valor){
            return view('login/editPerfil',['usuario' => $usuario, 'perfil' => $letras]);
        }else{
            //Para limpar a sessão
            session()->flush();
            return redirect('login');
        }
    }

    public function editUser(Request $request){

        $id_cliente = session('id');

        $editUser = Usuarios::findOrFail($id_cliente);

        $editUser->name = $request->nome;
        $editUser->telefone = $request->telefone;
        $editUser->email = $request->email;

        $editUser->save();

        session()->flush();

        return redirect('admin');
    }
}

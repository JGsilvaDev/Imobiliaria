<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class logoutController extends Controller
{
    public function index(){
        session()->flush();
        return redirect('login');
    }

    public function filtro(){
        Session::forget('search');
        return redirect('/imoveis');
    }

    public function limpaFiltro(Request $request){

        $search = session('search');
        $filtro = $request->filtro;

        // dd($filtro);

        if($filtro == 'titulo'){
            $search[0]->titulo = null;
        }

        if($filtro == 'localidade'){
            $search[0]->localidade = null;
        }

        if($filtro == 'quartos'){
            $search[0]->quartos = null;
        }

        if($filtro == 'banheiros'){
            $search[0]->banheiros = null;
        }

        if($filtro == 'vagas'){
            $search[0]->vagas = null;
        }

        if($filtro == 'valor'){
            $search[0]->valor = null;
        }

        if($filtro == 'area'){
            $search[0]->area = null;
        }

        if(
            $search[0]->titulo == null and $search[0]->localidade == null and
            $search[0]->quartos == null and $search[0]->banheiros == null and
            $search[0]->vagas == null and $search[0]->valor == null and $search[0]->area == null)
        {
            Session::forget('search');
        }

        return redirect('/imoveis');
    }
}

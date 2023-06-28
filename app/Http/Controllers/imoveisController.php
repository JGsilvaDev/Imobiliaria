<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class imoveisController extends Controller
{
    public function index(){
        $search = session('search');

        if($search){
            $imoveis = DB::table('catalogos')
                ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                ->join('imagens','imagens.chave','=','catalogos.id')
                ->select('catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','imagens.path')
                ->where('catalogos.titulo','like',$search)
                ->get();

        }else{
            $imoveis = DB::table('catalogos')
                ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                ->join('imagens','imagens.chave','=','catalogos.id')
                ->select('catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao','imagens.path')
                ->get();
        }

        // dd($imoveis);

        return view('imoveis.home',['imoveis' => $imoveis]);
    }

    public function search(Request $request){
        $session = session();

        $session->put([
            'search' => $request->search
        ]);

        return redirect('admin');
    }
}

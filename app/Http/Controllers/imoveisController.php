<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class imoveisController extends Controller
{
    public function index(){
        $search = session('search');

        if($search){
            $imoveis = DB::table('catalogos')
                ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao')
                ->where('catalogos.titulo','like',$search)
                ->get();

        }else{
            $imoveis = DB::table('catalogos')
                ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                ->select('catalogos.id','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao')
                ->get();
        }

        $imagem = DB::table('imagens')
                    ->select('chave','path')
                    ->get();

        if($imoveis->isEmpty()){
            $imagem = new \stdClass();

            $imagem->id = 0;
        }

        return view('imoveis.home',['imoveis' => $imoveis, 'imagens' => $imagem]);
    }

    public function search(Request $request){
        $session = session();

        $session->put([
            'search' => $request->search
        ]);

        return redirect()->back();
    }
}

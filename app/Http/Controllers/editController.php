<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class editController extends Controller
{

    public function index(Request $request){

        $id = $request->id;

        $itens = DB::table('catalogos')
                    ->select('id','id_tp_produto','titulo','descricao','area','valor', 'localidade')
                    ->where('id', '=', $id)
                    ->first();

        // dd($itens);

        return view('admin/edit',['item' => $itens]);
    }

    public function store(Request $request){
        DB::table('catalogos')
            ->where('id', '=', $request->id)
            ->update([
                'id_tp_produto' => $request->id_tp_produto,
                'titulo' => $request->titulo,
                'descricao' => $request->descricao,
                'area' => $request->area,
                'valor' => $request->valor,
                'localidade' => $request->localidade,
            ]);

        return redirect('admin/home');
    }

}

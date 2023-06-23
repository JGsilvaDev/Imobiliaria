<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class editController extends Controller
{

    public function index(){
        return view('admin/edit');
    }

    public function processaDados($id){

        $item =  DB::table('catalogos')
                ->select('id','id_tp_produto','titulo','descricao','area','valor','localidade')
                ->where('id', '=', $id)
                ->first();

        return view('admin/edit',['item' => $item]);
    }

    public function update(Request $request, $id){

        $modelo = Catalogo::findOrFail($id);

        // dd($modelo);

        $modelo->id_tp_produto = $request->id_tp_produto;
        $modelo->titulo = $request->titulo;
        $modelo->descricao = $request->descricao;
        $modelo->area = $request->area;
        $modelo->valor = $request->valor;
        $modelo->localidade = $request->localidade;

        $modelo->save();

        session()->flash('editado', 'Item editado com sucesso');

        return redirect('admin');
    }

    public function destroy($id){

        $item = Catalogo::findOrFail($id);
        $item->delete();

        session()->flash('exluir', 'Item excluido com sucesso');

        return redirect('admin');

    }

}

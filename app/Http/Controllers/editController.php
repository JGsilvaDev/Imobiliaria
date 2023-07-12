<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Imagens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class editController extends Controller
{

    public function index(){
        return view('admin/edit');
    }

    public function processaDados($id){

        $item =  DB::table('catalogos')
                    ->join('produtos','produtos.id','=','catalogos.id_tp_produto')
                    ->select('catalogos.id','catalogos.id_tp_produto','catalogos.qtdBanheiros','catalogos.qtdVagas','catalogos.qtdQuartos','catalogos.titulo','catalogos.localidade','catalogos.area','catalogos.valor','produtos.descricao')
                    ->where('catalogos.id','=',$id)
                    ->first();

        $imagem = DB::table('imagens')
                ->select('id','chave','path')
                ->get();

        return view('admin/edit',['item' => $item, 'imagem' => $imagem]);
    }

    public function update(Request $request, $id){

        $modelo = Catalogo::findOrFail($id);

        $id_cliente = session('id');

        $modelo->id_tp_produto = $request->id_tp_produto;
        $modelo->titulo = $request->titulo;
        $modelo->descricao = $request->descricao;
        $modelo->area = $request->area;
        $modelo->valor = $request->valor;
        $modelo->localidade = $request->localidade;

        $modelo->save();

        $folderName = $id_cliente.'_'.uniqid();

        if($request->allFiles() != []){

            for($i = 0; $i < count($request->allFiles()['imagem']); $i++){
                $file = $request->allFiles()['imagem'][$i];

                $fileName = $file->store('public/img/'. $folderName);

                $fileNameFormat = str_replace('public/img/','storage/img/',$fileName);

                $imagem = new Imagens();
                $imagem->chave = $id;
                $imagem->path = $fileNameFormat;
                $imagem->save();
                unset($imagem);
            }
        }

        session()->flash('editado', 'Item editado com sucesso');

        return redirect('admin');
    }

    public function destroy($id){

        $item = Catalogo::findOrFail($id);

        $item->delete();

        session()->flash('excluir', 'Item excluido com sucesso');

        return redirect('admin');

    }

    public function destroyImg($id){

        $item = Imagens::findOrFail($id);

        $item->delete();

        return response()->json(['mensagem' => 'Item excluído com sucesso']);;

    }

}

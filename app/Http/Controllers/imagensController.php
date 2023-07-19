<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ImagensPrincipais;

class imagensController extends Controller
{
    public function store(Request $request){

        $id_cliente = session('id');

        $catalogo =  DB::table('catalogos')
                    ->select('id')
                    ->orderByDesc('id')
                    ->first();

        $folderName = $id_cliente.'_'.uniqid();

        $file = $request->file('imagem');

        $fileName = $file->store('public/img/'. $folderName);

        $fileNameFormat = str_replace('public/img/','storage/img/',$fileName);

        $imagem =  new ImagensPrincipais();

        $imagem->chave = $catalogo->id + 1;
        $imagem->path = $fileNameFormat;

        $imagem->save();

        return response()->json(['mensagem' => 'Atribuido como imagem principal']);
    }
}

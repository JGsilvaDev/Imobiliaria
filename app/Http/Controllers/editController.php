<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Imagens;
use App\Models\ImagensPrincipais;
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
                    ->select('catalogos.id','catalogos.descricao as desc','catalogos.id_tp_produto',
                      'catalogos.qtdBanheiros','catalogos.qtdGaragemCobertas','catalogos.qtdGaragemNaoCobertas','catalogos.qtdQuartos','catalogos.titulo',
                      'catalogos.cidade','catalogos.bairro','catalogos.ruaNumero','catalogos.cep','catalogos.area','catalogos.valor','produtos.descricao','catalogos.qtdSuites',
                      'catalogos.areaUtil','catalogos.areaTerreno','catalogos.areaConstruida','catalogos.valorCondominio',
                      'catalogos.iptuMensal','catalogos.agua','catalogos.energia','catalogos.esgoto','catalogos.murado',
                      'catalogos.pavimentação','catalogos.areaServico','catalogos.banheiroAuxiliar','catalogos.banheiroEmpregada',
                      'catalogos.cozinha','catalogos.cozinhaPlanejada','catalogos.despensa','catalogos..lavanderias',
                      'catalogos.guarita','catalogos.portaria24h','catalogos.areaLazer','catalogos.churrasqueira',
                      'catalogos.playground','catalogos.quadra','catalogos.varanda','catalogos.varandaGourmet',
                      'catalogos.lavado','catalogos.roupeiro','catalogos.suiteMaster','catalogos.closet','catalogos.pisoFrio',
                      'catalogos.porcelanato','catalogos.entradaServico','catalogos.jardim','catalogos.escritorio',
                      'catalogos.moveisPlanejados','catalogos.portaoEletronico','catalogos.quintal')
                    ->where('catalogos.id','=',$id)
                    ->first();

        $imagem = DB::table('imagens')
                ->select('id','chave','path')
                ->get();

        $imagemPrincipal = DB::table('imagens_principais')
                ->select('id','chave','path')
                ->where('chave','=', $id)
                ->first();

        return view('admin/edit',['item' => $item, 'imagem' => $imagem, 'imagemPrincipal' => $imagemPrincipal]);
    }

    public function update(Request $request, $id){

        $catalogo = Catalogo::findOrFail($id);

        $id_cliente = session('id');

        $catalogo->id_tp_produto = $request->id_produto;
        $catalogo->id_cliente = $id_cliente;
        $catalogo->titulo = $request->titulo;
        $catalogo->descricao = $request->descricao;
        $catalogo->area = intval(explode(',',str_replace('.','',$request->area))[0]);
        $catalogo->areaUtil = intval(explode(',',str_replace('.','',$request->areaUtil))[0]);
        $catalogo->areaConstruida = intval(explode(',',str_replace('.','',$request->areaConstruida))[0]);
        $catalogo->areaTerreno = intval(explode(',',str_replace('.','',$request->areaTerreno))[0]);
        $catalogo->valor = doubleval(str_replace(',','.',str_replace('.','',$request->valor)));
        $catalogo->cidade = $request->cidade;
        $catalogo->bairro = $request->bairro;
        $catalogo->ruaNumero = $request->ruaNumero;
        $catalogo->cep = $request->cep;
        $catalogo->qtdSuites = $request->qtd_suites;
        $catalogo->valorCondominio = doubleval(str_replace(',','.',str_replace('.','',$request->valorCondominio)));
        $catalogo->iptuMensal = doubleval(str_replace(',','.',str_replace('.','',$request->iptu)));
        $catalogo->agua = ($request->agua) ? true : false;
        $catalogo->energia = ($request->energia) ? true : false;
        $catalogo->esgoto = ($request->esgoto) ? true : false;
        $catalogo->murado = ($request->murado) ? true : false;
        $catalogo->pavimentação = ($request->pavimentação) ? true : false;
        $catalogo->areaServico = ($request->areaServico) ? true : false;
        $catalogo->banheiroAuxiliar = ($request->banheiroAux) ? true : false;
        $catalogo->banheiroEmpregada = ($request->banheiroEmpregada) ? true : false;
        $catalogo->cozinha = ($request->cozinha) ? true : false;
        $catalogo->cozinhaPlanejada = ($request->cozinhaPlanejada) ? true : false;
        $catalogo->despensa = ($request->despensa) ? true : false;
        $catalogo->lavanderias = ($request->lavanderias) ? true : false;
        $catalogo->guarita = ($request->guarita) ? true : false;
        $catalogo->portaria24h = ($request->portaria24) ? true : false;
        $catalogo->areaLazer = ($request->areaLazer) ? true : false;
        $catalogo->churrasqueira = ($request->churrasqueira) ? true : false;
        $catalogo->playground = ($request->playground) ? true : false;
        $catalogo->quadra = ($request->quadra) ? true : false;
        $catalogo->varanda = ($request->varanda) ? true : false;
        $catalogo->varandaGourmet = ($request->varandaGourmet) ? true : false;
        $catalogo->pisoFrio = ($request->pisoFrio) ? true : false;
        $catalogo->porcelanato = ($request->porcelanato) ? true : false;
        $catalogo->lavado = ($request->lavado) ? true : false;
        $catalogo->roupeiro = ($request->roupeiro) ? true : false;
        $catalogo->suiteMaster = ($request->suiteMaster) ? true : false;
        $catalogo->closet = ($request->closet) ? true : false;
        $catalogo->entradaServico = ($request->entradaServico) ? true : false;
        $catalogo->escritorio = ($request->escritorio) ? true : false;
        $catalogo->jardim = ($request->jardim) ? true : false;
        $catalogo->moveisPlanejados = ($request->moveisPlanejados) ? true : false;
        $catalogo->portaoEletronico = ($request->portaoEletronico) ? true : false;
        $catalogo->quintal = ($request->quintal) ? true : false;

        $catalogo->save();

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

        return response()->json(['mensagem' => 'Item excluído com sucesso']);

    }

    public function alterarImgPrincipal($id){

        $imagem = Imagens::findOrFail($id);

        $chave = $imagem->chave;

        $imagemPrincipal = DB::table('imagens_principais')
                ->select('id','chave','path')
                ->where('chave','=', $chave)
                ->first();

        $itenAlterado = ImagensPrincipais::findOrFail($imagemPrincipal->id);

        $itenAlterado->path = $imagem->path;

        $itenAlterado->save();

        return response()->json(['mensagem' => 'Imagem principal alterada com sucesso']);
    }

}

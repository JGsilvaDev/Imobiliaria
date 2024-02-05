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
                      'catalogos.pavimentacao','catalogos.areaServico','catalogos.gasEncanado','catalogos.banheiroEmpregada',
                      'catalogos.cozinha','catalogos.cozinhaPlanejada','catalogos.despensa','catalogos..lavanderias',
                      'catalogos.guarita','catalogos.portaria24h','catalogos.areaLazer','catalogos.churrasqueira','catalogos.churrasqueiraCondominio',
                      'catalogos.playground','catalogos.quadra','catalogos.varanda','catalogos.varandaGourmet','catalogos.sacadaGourmet',
                      'catalogos.lavado','catalogos.roupeiro','catalogos.suiteMaster','catalogos.closet','catalogos.pisoFrio',
                      'catalogos.porcelanato','catalogos.entradaServico','catalogos.jardim','catalogos.escritorio',
                      'catalogos.moveisPlanejados','catalogos.portaoEletronico','catalogos.quintal', 'catalogos.qtdSacadasCobertas', 'catalogos.cozinhaConjugada', 'catalogos.porteiroEletronico', 'catalogos.quintal', 'catalogos.tvCabo', 'catalogos.arCondicionado', 'catalogos.alarme', 'catalogos.aguaSolar', 'catalogos.mobiliado', 'catalogos.depEmpregados', 'catalogos.lareira', 'catalogos.caseiro', 'catalogos.edicula', 'catalogos.piscina', 'catalogos.piscinaCondominio', 'catalogos.terraco', 'catalogos.hidromassagem', 'catalogos.jardimInverno', 'catalogos.pisoAquecido', 'catalogos.pisoArdosia', 'catalogos.pisoBioquete', 'catalogos.pisoCarpete', 'catalogos.pisoCeramica', 'catalogos.pisoCimentoQueimado', 'catalogos.pisoEmborrachado', 'catalogos.pisoTacoMadeira', 'catalogos.contraPiso', 'catalogos.pisoTabua', 'catalogos.granito', 'catalogos.marmore', 'catalogos.armarioCozinha', 'catalogos.armarioCorredor', 'catalogos.armarioCloset', 'catalogos.armarioQuarto', 'catalogos.armarioBanheiro', 'catalogos.armarioSala', 'catalogos.armarioEscritorio', 'catalogos.armarioDepEmp', 'catalogos.armarioAreaServico', 'catalogos.salaCinema', 'catalogos.adega', 'catalogos.sauna', 'catalogos.campFut', 'catalogos.salaJogos', 'catalogos.salaFestas', 'catalogos.salaGinastica', 'catalogos.estacionamentoVisita', 'catalogos.acessoEnergia', 'catalogos.escola', 'catalogos.comercio', 'catalogos.elevadores', 'catalogos.copa', 'catalogos.recepcao', 'catalogos.mesanino', 'catalogos.luminarias', 'catalogos.acessoDeficiente', 'catalogos.geradorEnergia', 'catalogos.telefonia', 'catalogos.rede', 'catalogos.qtdSalas', 'catalogos.qtdDorms', 'catalogos.metragemFrente', 'catalogos.metragemFundo','catalogos.metragemDireita','catalogos.metragemEsquerda','catalogos.posTerreno','catalogos.formaTerreno','catalogos.topografia', 'catalogos.vegetacao', 'catalogos.protecao','catalogos.tipoComercio', 'catalogos.sistemaIncendio', 'catalogos.aquecimentoCentral','catalogos.vigilancia24h', 'catalogos.vestiario','catalogos.extraInfo','catalogos.aguaEncanada','catalogos.sistemaEsgoto')
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

        if($catalogo->valor != doubleval(str_replace(',','.',str_replace('.','',$request->valor)))) {
            $catalogo->valor = doubleval(str_replace(',','.',str_replace('.','',$request->valor)));
        }
        $catalogo->valor = doubleval(str_replace(',','.',$request->valor));

        if($catalogo->valorcondominio != doubleval(str_replace(',','.',str_replace('.','',$request->valorCondominio)))) {
            $catalogo->valorCondominio = doubleval(str_replace(',','.',str_replace('.','',$request->valorCondominio)));
        }
        $catalogo->valorCondominio = doubleval(str_replace(',','.',$request->valorCondominio));
        
        if($catalogo->iptuMensal != doubleval(str_replace(',','.',str_replace('.','',$request->iptuMensal)))) {
            $catalogo->iptuMensal = doubleval(str_replace(',','.',str_replace('.','',$request->iptuMensal)));
        }
        $catalogo->iptuMensal = doubleval(str_replace(',','.',$request->iptu));

        $catalogo->qtdSacadasCobertas = $request->qtd_sacadasCobertas;
        $catalogo->cidade = $request->cidade;
        $catalogo->bairro = $request->bairro;
        $catalogo->ruaNumero = $request->ruaNumero;
        $catalogo->cep = $request->cep;
        $catalogo->qtdSuites = $request->qtd_suites;
        
        $catalogo->sistemaEsgoto = ($request->sistemaEsgoto) ? true : false;
        $catalogo->agua = ($request->agua) ? true : false;
        $catalogo->aguaEncanada = ($request->aguaEncanada) ? true : false;
        $catalogo->energia = ($request->energia) ? true : false;
        $catalogo->esgoto = ($request->esgoto) ? true : false;
        $catalogo->murado = ($request->murado) ? true : false;
        $catalogo->pavimentacao = ($request->pavimentacao) ? true : false;
        $catalogo->areaServico = ($request->areaServico) ? true : false;
        $catalogo->gasEncanado = ($request->banheiroAux) ? true : false;
        $catalogo->banheiroEmpregada = ($request->banheiroEmpregada) ? true : false;
        $catalogo->cozinha = ($request->cozinha) ? true : false;
        $catalogo->cozinhaPlanejada = ($request->cozinhaPlanejada) ? true : false;
        $catalogo->despensa = ($request->despensa) ? true : false;
        $catalogo->lavanderias = ($request->lavanderias) ? true : false;
        $catalogo->guarita = ($request->guarita) ? true : false;
        $catalogo->portaria24h = ($request->portaria24) ? true : false;
        $catalogo->areaLazer = ($request->areaLazer) ? true : false;
        $catalogo->churrasqueira = ($request->churrasqueira) ? true : false;
        $catalogo->churrasqueiraCondominio = ($request->churrasqueiraCondominio) ? true : false;
        $catalogo->playground = ($request->playground) ? true : false;
        $catalogo->quadra = ($request->quadra) ? true : false;
        $catalogo->varanda = ($request->varanda) ? true : false;
        $catalogo->varandaGourmet = ($request->varandaGourmet) ? true : false;
        $catalogo->sacadaGourmet = ($request->sacadaGourmet) ? true : false;
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
        $catalogo->cozinhaConjugada = ($request->cozinhaConjugada) ? true : false;
        $catalogo->porteiroEletronico = ($request->porteiroEletronico) ? true : false;
        $catalogo->tvCabo = ($request->tvCabo) ? true : false;

        /* NOVOS CAMPOS */
        $catalogo->extraInfo = $request->extraInfo;
        $catalogo->arCondicionado = ($request->arCondicionado) ? true : false;
        $catalogo->alarme = ($request->alarme) ? true : false;
        $catalogo->aguaSolar = ($request->aguaSolar) ? true : false;
        $catalogo->mobiliado = ($request->mobiliado) ? true : false;
        $catalogo->depEmpregados = ($request->depEmpregados) ? true : false;
        $catalogo->lareira = ($request->lareira) ? true : false;
        $catalogo->caseiro = ($request->caseiro) ? true : false;
        $catalogo->edicula = ($request->edicula) ? true : false;
        $catalogo->piscina = ($request->piscina) ? true : false;
        $catalogo->piscinaCondominio = ($request->piscinaCondominio) ? true : false;
        $catalogo->terraco = ($request->terraco) ? true : false;
        $catalogo->hidromassagem = ($request->hidromassagem) ? true : false;
        $catalogo->jardimInverno = ($request->jardimInverno) ? true : false;
        $catalogo->pisoAquecido = ($request->pisoAquecido) ? true : false;
        $catalogo->pisoArdosia = ($request->pisoArdosia) ? true : false;
        $catalogo->pisoBioquete = ($request->pisoBioquete) ? true : false;
        $catalogo->pisoCarpete = ($request->pisoCarpete) ? true : false;
        $catalogo->pisoCeramica = ($request->pisoCeramica) ? true : false;
        $catalogo->pisoCimentoQueimado = ($request->pisoCimentoQueimado) ? true : false;
        $catalogo->pisoEmborrachado = ($request->pisoEmborrachado) ? true : false;
        $catalogo->pisoTacoMadeira = ($request->pisoTacoMadeira) ? true : false;
        $catalogo->contraPiso = ($request->contraPiso) ? true : false;
        $catalogo->pisoTabua = ($request->pisoTabua) ? true : false;
        $catalogo->granito = ($request->granito) ? true : false;
        $catalogo->marmore = ($request->marmore) ? true : false;
        $catalogo->armarioCozinha = ($request->armarioCozinha) ? true : false;
        $catalogo->armarioCorredor = ($request->armarioCorredor) ? true : false;
        $catalogo->armarioCloset = ($request->armarioCloset) ? true : false;
        $catalogo->armarioQuarto = ($request->armarioQuarto) ? true : false;
        $catalogo->armarioBanheiro = ($request->armarioBanheiro) ? true : false;
        $catalogo->armarioSala = ($request->armarioSala) ? true : false;
        $catalogo->armarioEscritorio = ($request->armarioEscritorio) ? true : false;
        $catalogo->armarioDepEmp = ($request->armarioDepEmp) ? true : false;
        $catalogo->armarioAreaServico = ($request->armarioAreaServico) ? true : false;
        $catalogo->salaCinema = ($request->salaCinema) ? true : false;
        $catalogo->adega = ($request->adega) ? true : false;
        $catalogo->sauna = ($request->sauna) ? true : false;
        $catalogo->campFut = ($request->campFut) ? true : false;
        $catalogo->salaJogos = ($request->salaJogos) ? true : false;
        $catalogo->salaFestas = ($request->salaFestas) ? true : false;
        $catalogo->salaGinastica = ($request->salaGinastica) ? true : false;
        $catalogo->estacionamentoVisita = ($request->estacionamentoVisita) ? true : false;
        $catalogo->acessoEnergia = ($request->acessoEnergia) ? true : false;
        $catalogo->escola = ($request->escola) ? true : false;
        $catalogo->comercio = ($request->comercio) ? true : false;
        $catalogo->qtdSalas = $request->qtd_salas;
        $catalogo->qtdDorms = $request->qtd_dorms;
        $catalogo->qtdBanheiros = $request->qtd_banheiros;
        $catalogo->qtdGaragemCobertas = $request->qtd_garagemCobertas;
        $catalogo->qtdGaragemNaoCobertas = $request->qtd_garagemNaoCobertas;
        $catalogo->qtdQuartos = $request->qtd_quartos;
        $catalogo->metragemFrente = intval(explode(',',str_replace('.','',$request->metragemFrente))[0]);
        $catalogo->metragemFundo = intval(explode(',',str_replace('.','',$request->metragemFundo))[0]);
        $catalogo->metragemDireita = intval(explode(',',str_replace('.','',$request->metragemDireita))[0]);
        $catalogo->metragemEsquerda = intval(explode(',',str_replace('.','',$request->metragemEsquerda))[0]);
        $catalogo->formaTerreno = $request->formaTerreno;
        $catalogo->vegetacao = $request->vegetacao;
        $catalogo->protecao = $request->protecao;
        $catalogo->topografia = $request->topografia;
        $catalogo->tipoComercio = $request->tipoComercio;
        $catalogo->elevadores = $request->elevadores;
        $catalogo->copa = ($request->copa) ? true : false;
        $catalogo->recepcao = ($request->recepcao) ? true : false;
        $catalogo->mesanino = ($request->mesanino) ? true : false;
        $catalogo->luminarias = ($request->luminarias) ? true : false;
        $catalogo->acessoDeficiente = ($request->acessoDeficiente) ? true : false;
        $catalogo->geradorEnergia = ($request->geradorEnergia) ? true : false;
        $catalogo->telefonia = ($request->telefonia) ? true : false;
        $catalogo->rede = ($request->rede) ? true : false;
        $catalogo->vestiario = ($request->vestiario) ? true : false;

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

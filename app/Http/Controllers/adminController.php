<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Catalogo;
use App\Models\Imagens;
use App\Models\ImagensPrincipais;

class adminController extends Controller
{
    public function index(){
        //Pegar valor da sessão
        $valor = session('login');
        $id_cliente = session('id');
        $search = session('search');

        $dadosUsuario = DB::table('usuarios')
                    ->select('id_permissao','name','email')
                    ->where('id', '=', $id_cliente)
                    ->first();

        if($dadosUsuario != null){
            if($dadosUsuario->id_permissao == 2){
                if($search){
                    $itens = DB::table('catalogos')
                                ->select('id','id_tp_produto','titulo','descricao','area','valor', 'vendidoAlugado')
                                ->where('id_cliente', '=', $id_cliente)
                                ->where('titulo', 'like','%'. $search.'%')
                                ->get();

                }else{
                    $itens = DB::table('catalogos')
                                ->select('id','id_tp_produto','titulo','descricao','area','valor', 'vendidoAlugado')
                                ->where('id_cliente', '=', $id_cliente)
                                ->get();
                }

                if($itens->isEmpty()){
                    $imagem = new \stdClass();
                    $imagem->chave = 0;

                }else{
                    $imagem = DB::table('imagens_principais')
                                ->select('chave','path')
                                ->get();
                }

            }else{
                if($search){
                    $itens = DB::table('catalogos')
                                ->select('id','id_tp_produto','titulo','descricao','area','valor', 'vendidoAlugado')
                                ->where('titulo', 'like','%'. $search .'%')
                                ->get();
                }else{
                    $itens = DB::table('catalogos')
                                    ->select('id','id_tp_produto','titulo','descricao','area','valor', 'vendidoAlugado')
                                    ->get();
                }

                if($itens->isEmpty()){
                    $imagem = new \stdClass();
                    $imagem->chave = 0;

                }else{
                    $imagem = DB::table('imagens_principais')
                                ->select('chave','path')
                                ->get();
                }

            }

            if($valor){
                return view('admin/home',['itens' => $itens, 'paths' => $imagem, 'usuario' => $dadosUsuario]);
            }else{
                //Para limpar a sessão
                session()->flush();
                return redirect('login');
            }
        }

        $itens = false;

        if($valor){
            return view('admin/home',['itens' => $itens]);
        }else{
            //Para limpar a sessão
            session()->flush();
            return redirect('login');
        }
    }

    public function item(){
        $valor = session('login');

        if($valor){
            return view('admin/cadastro');
        }else{
            //Para limpar a sessão
            session()->flush();
            return redirect('login');
        }
    }

    public function search(Request $request){
        $session = session();

        $session->put([
            'search' => $request->search
        ]);

        return redirect('admin');
    }

    public function store(Request $request){
        $valor = session('login');
        $id_cliente = session('id');

        if($valor){

            $catalogo = new Catalogo();

            $catalogo->id_tp_produto = $request->id_produto;
            $catalogo->id_cliente = $id_cliente;
            $catalogo->titulo = $request->titulo;
            $catalogo->descricao = $request->descricao;
            $catalogo->area = $request->area;
            $catalogo->valor = doubleval(explode(',',str_replace('.','',$request->valor))[0]);
            $catalogo->cidade = $request->cidade;
            $catalogo->bairro = $request->bairro;
            $catalogo->ruaNumero = $request->ruaNumero;
            $catalogo->cep = $request->cep;
            $catalogo->qtdSuites = $request->qtd_suites;
            $catalogo->valorCondominio = doubleval(explode(',',str_replace('.','',$request->valorCondominio))[0]);
            $catalogo->iptuMensal = doubleval(explode(',',str_replace('.','',$request->iptu))[0]);
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

            if($request->id_produto != 1 ){
                $catalogo->tp_contrato = $request->tp_contrato;
                $catalogo->qtdBanheiros = $request->qtd_banheiros;
                $catalogo->qtdQuartos = $request->qtd_quartos;
                $catalogo->qtdGaragemCobertas = $request->qtdGaragemCobertas;
                $catalogo->qtdGaragemNaoCobertas = $request->qtdGaragemNaoCobertas;
                $catalogo->areaUtil = $request->areaUtil;
                $catalogo->areaConstruida = $request->areaConstruida;
                $catalogo->areaTerreno = $request->areaTerreno;
            }else{
                $catalogo->tp_contrato = 'Venda';
                $catalogo->qtdBanheiros = 0;
                $catalogo->qtdQuartos = 0;
                $catalogo->qtdGaragemCobertas = 0;
                $catalogo->qtdGaragemNaoCobertas = 0;
                $catalogo->areaUtil = 0;
                $catalogo->areaConstruida = 0;
                $catalogo->areaConstruida = 0;
            }

            $catalogo->save();

            $folderName = $id_cliente.'_'.uniqid();

            for($i = 0; $i < count($request->allFiles()['imagem']); $i++){
                $file = $request->allFiles()['imagem'][$i];

                $fileName = $file->store('public/img/'. $folderName);

                $fileNameFormat = str_replace('public/img/','storage/img/',$fileName);

                $fileFormat = substr(strrchr($fileNameFormat, '.'), 1);


                $imagemOriginal = $fileNameFormat;

                $marcaDagua = 'img/watermark.png';

                // Carregue a imagem original
                //verificando o formato da imagem
                if ($fileFormat === 'png') {
                    $imagem = imagecreatefrompng($imagemOriginal);
                }
                else if ($fileFormat === 'jpg') {
                    $imagem = imagecreatefromjpeg($imagemOriginal);
                }


                // Carregue a imagem da marca d'água
                $marcaDaguaImagem = imagecreatefrompng($marcaDagua);

                // Redimensionando imagem
                $imagem = imagescale($imagem, 1280, 720);

                // Obtenha as dimensões da imagem original e da marca d'água
                $larguraImagem = imagesx($imagem);
                $alturaImagem = imagesy($imagem);
                $larguraMarcaDagua = imagesx($marcaDaguaImagem);
                $alturaMarcaDagua = imagesy($marcaDaguaImagem);


                // Calcule a posição para a marca d'água (por exemplo, canto inferior direito)
                $posicaoX = $larguraImagem/2 - $larguraMarcaDagua/2; // 10 pixels da margem direita
                $posicaoY = $alturaImagem/2 - $alturaMarcaDagua/2; // 10 pixels da margem inferior


                // Define a cor transparente da imagem da marca d'água
                $corTransparente = imagecolorallocatealpha($marcaDaguaImagem, 0, 0, 0, 127);
                imagecolortransparent($marcaDaguaImagem, $corTransparente);

                // Mesclar a marca d'água na imagem original com transparência
                imagecopymerge($imagem, $marcaDaguaImagem, $posicaoX, $posicaoY, 0, 0, $larguraMarcaDagua, $alturaMarcaDagua, 50); // O último valor (50) controla a opacidade da marca d'água (0 a 100)

                // Salvar a imagem resultante (substitua a imagem original ou escolha um novo nome)
                imagejpeg($imagem, $fileNameFormat);

                // Liberar recursos
                imagedestroy($imagem);
                imagedestroy($marcaDaguaImagem);

                $imagem = new Imagens();
                $imagem->chave = $catalogo->id;
                $imagem->path = $fileNameFormat;
                $imagem->save();
                unset($imagem);
            }

            /* Imagem Principal */
            if($request->id_produto == 1 ){
                $filePrincipal = $request->imagemTerrenoPrincipal;
            }else if($request->id_produto == 2){
                $filePrincipal = $request->imagemCasaPrincipal;
            }else{
                $filePrincipal = $request->imagemApPrincipal;
            }

            $fileNamePrincipal = $filePrincipal->store('public/img/'. $folderName);

            $fileNamePrincipalFormat = str_replace('public/img/','storage/img/',$fileNamePrincipal);

            $imagem =  new ImagensPrincipais();

            $imagem->chave = $catalogo->id;
            $imagem->path = $fileNamePrincipalFormat;

            $imagem->save();

            if($request->id_produto == 1){
                $msg = 'Terreno cadastrado com sucesso';
            }elseif($request->id_produto == 2){
                $msg = 'Casa cadastrado com sucesso';
            }else{
                $msg = 'Apartamento cadastrado com sucesso';
            }

            session()->flash('success', $msg);

            Session::forget('search');

            return redirect('admin');
        }else{
            //Para limpar a sessão
            session()->flush();
            return redirect('login');
        }
    }

    public function vendidoAlugado(Request $request, $id){
        $valor = session('login');

        if($valor){
            $catalogo = Catalogo::findOrFail($id);

            if($request->type == '1'){
                $catalogo->vendidoAlugado = null;
                if($catalogo->tp_contrato == 'Aluguel'){
                    Session::flash('vendidoAlugado', 'O imovel foi desalugado');
                }else{
                    Session::flash('vendidoAlugado', 'O imovel desvendido');
                }
            }else{
                if($catalogo->tp_contrato == 'Aluguel'){
                    $catalogo->vendidoAlugado = 'Alugado';
                    Session::flash('vendidoAlugado', 'O imovel alugado');
                }else{
                    $catalogo->vendidoAlugado = 'Vendido';
                    Session::flash('vendidoAlugado', 'O imovel vendido');
                }
            }

            $catalogo->save();

            return redirect()->back();
        }else{
            //Para limpar a sessão
            session()->flush();
            return redirect('login');
        }

    }
}

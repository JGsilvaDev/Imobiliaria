@extends('layouts.font_import')

@section('title','contatos')

@section('content')
<link rel="stylesheet" href="{{ asset('css/font-standards.css') }}">
<div id="contatos-navbar">
    <p id="hello-user">Olá, {{ $usuario->name }}</p>
    <div id="dropdown-menu">
        <select name="opcao" class="nav-btn" id="dropdown">
            <option value="" selected disabled>Menu</option>
            <option value="" data-url="/">Home</option>
            <option value="" data-url="/admin">Meus imóveis</option>
            <option value="" data-url="/admin/contatos">Requisições</option>
            <option value="" data-url="/admin/editUsuario">Perfil</option>
            <option value="" data-url="/logout">Sair</option>
        </select>
    </div>
</div>

    <link rel="stylesheet" href="{{ asset('css/request.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminnavbar.css') }}">
    <script src="{{ asset('js/dropDown.js') }}"></script>
    <div id="corpo">
        <div id="popup-informacoes" style="display:none">
            <button id="btn-popup-fechar" onclick="fecharInfo()">X</button>
            <h1>Informações</h1>
            <div class="cliente-dados">
                <div class="cliente-dados-container" style="display: none">
                    <p class="dados-info" id="dados-id">XXXXXX</p>
                </div>
                <div class="cliente-dados-container">
                    <p class="dados-title">Nome</p>
                    <p class="dados-info" id="dados-nome">XXXXXX</p>
                </div>
                <div class="cliente-dados-container">
                    <p class="dados-title">Telefone</p>
                    <p class="dados-info" id="dados-telefone">XXXXXX</p>
                </div>
                <div class="cliente-dados-container">
                    <p class="dados-title">Email</p>
                    <p class="dados-info" id="dados-email">XXXXXX</p>
                </div>
                <div class="cliente-dados-container">
                    <p class="dados-title">Motivo do contato</p>
                    <p class="dados-info" id="dados-motivo">XXXXXX</p>
                </div>
                <div class="cliente-dados-container">
                    <p class="dados-title">Mensagem</p>
                    <p class="dados-info" id="dados-mensagem">XXXXXX</p>
                </div>

            </div>
            <div class="cliente-botoes">
                <button title="Apaga o contato da lista, use caso já tenha resolvido" class="cliente-btn" id="cliente-apagar" onclick="deletar(event)">Apagar</button>
                <button title="Marca o contato como solucionado, mas não o apaga da lista" class="cliente-btn" id="cliente-solucionar" onclick="solucionar(event)">Solucionar</button>
            </div>
        </div>

        <form action="\admin\contatos" method="post">
            @csrf
            <input type="hidden" id="solucionar" name="solucionar">
            <button id="btn-solucionar" type="submit" style="display: none"></button>
        </form>

        <form action="\admin\contatos\delete" method="post">
            @csrf
            <input type="hidden" id="deletar" name="deletar">
            <button id="btn-deletar" type="submit" style="display: none"></button>
        </form>

        <div class="responsive">
            
            <table cellspacing="0" id="request-table">
    
                <thead class="table-header" cellspacing="0">
                    <th class="table-title"></th>
                    <th class="table-title">Código do Imóvel</th>
                    <th class="table-title">Nome</th>
                    <th class="table-title">Telefone</th>
                    <th class="table-title">Email</th>
                    <th class="table-title">Motivo do Contato</th>
                    <th class="table-title">Resolvido</th>
                </thead>
    
                @foreach ($contatos as $cont)
                    <tr class="table-body solved-{{ $cont->resolvido }}">
                        <td class="body-info"><button class="button-info" id="information-{{$cont->id}}"  onclick="mostrarInfo(event)" >Ver</button></td>
                        <td class="body-info divider-left information-{{$cont->id}}" >{{$cont->cod_imovel}}</td>
                        <td class="body-info divider-left information-{{$cont->id}}" >{{$cont->nome}}</td>
                        <td class="body-info divider-left information-{{$cont->id}}" >{{ $cont->telefone }}</td>
                        <td class="body-info divider-left information-{{$cont->id}}" >{{ $cont->email }}</td>
                        <td class="body-info divider-left information-{{$cont->id}}" >{{ $cont->motivoContato }}</td>
                        <td class="body-info divider-left information-{{$cont->id}}" style="display: none">{{ $cont->id }}</td>
                        <input class=" information-{{$cont->id}}" type="hidden" name="" value="{{ $cont->mensagem}}">
                        @if($cont->resolvido == 1)
                            <td class="body-info divider-left information-{{$cont->id}}">Resolvido</td>
                        @else
                            <td class="body-info divider-left information-{{$cont->id}}">Não resolvido</td>
                        @endif
                    </tr>
                @endforeach
    
    
    
    
    
                <!--
                    USANDO O INFORMATION ID NA HORA DE INTEGRAR
                    A CLASSE INFORMATION ID É IMPORTANTE PARA PUXAR AS INFORMAÇÕES PRO JS
                    O JAVASCRIPT CRIA UM ARRAY BASEADO NESSA CLASSE, PORTANTO, O NOME DA CLASSE DEVE SER "information-ID_DO_CLIENTE"
    
                    FAVOR COMUNICAR O DIGAS CASO HAJA QUALQUER DÚVIDA
    
                    APAGAR ESSA MENSAGEM APÓS SE CERTIFICAR DE QUE TUDO ESTÁ RODANDO CORRETAMENTE
                -->
    
            </table>
            
        </div>

    </div>

<script>
    //carrega as informações e então abre o painel
    function mostrarInfo(event) {
        loadInfo(event);
        const popup = document.getElementById('popup-informacoes')

        popup.style.display = 'flex'
    }

    //fecha o painel
    function fecharInfo() {
        const popup = document.getElementById('popup-informacoes')
        popup.style.display = 'none'
    }

    //carrega as informações
    function loadInfo(event) {
        const client_id = event.target.id
        //arrays
        const dados_array = [
            document.getElementById('dados-nome'),
            document.getElementById('dados-telefone'),
            document.getElementById('dados-email'),
            document.getElementById('dados-motivo'),
            document.getElementById('dados-id'),
            document.getElementById('dados-mensagem')
        ]
        const info_array = document.getElementsByClassName(client_id)

        for(let i=0; i<dados_array.length-1; i++) {
            dados_array[i].innerHTML = info_array[i].innerHTML
        }
        dados_array[5].innerHTML = info_array[5].value
    }

    function solucionar(event){
        var id = event.target.parentElement.parentElement.children[2].children[0].children[0].innerHTML;
        var button = document.getElementById('btn-solucionar');
        var input = document.getElementById('solucionar');

        input.value = id;
        button.click();
    }

    function deletar(event){
        var id = event.target.parentElement.parentElement.children[2].children[0].children[0].innerHTML;
        var button = document.getElementById('btn-deletar');
        var input = document.getElementById('deletar');

        input.value = id;
        button.click();
    }

</script>

<script src="{{ asset('js/check-scroll.js') }}"></script>
@endsection

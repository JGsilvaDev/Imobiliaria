@extends('layouts.font_import')

@section('title','Cadastrar Cliente')

@section('content')
<link rel="stylesheet" href="{{ asset('css/font-standards.css') }}">

    @if(Session::has('warning'))
        <div class="alert alert-warning">
            {{ Session::get('warning') }}
        </div>
    @endif

    @if(Session::has('success'))
        <div class="alert alert-warning">
            {{ Session::get('success') }}
        </div>
    @endif

    <link rel="stylesheet" href="{{ asset('css/cadastro-cliente.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/manager.css') }}">


    <div id="imovel-header">
        <p id="hello-user">Gerenciador de clientes</p>
        <section id="header-botoes">
            <button class="nav-btn" id="novo-imovel" onclick="window.location.href='/admin'">Voltar</button>

            <form action="logout" method="POST">
                @csrf
                <button class="nav-btn" id="sair" type="submit" style="display: none"></button>
            </form>
        </section>

    </div>

    <div id="tab-buttons">
        <button onclick="openTab(0,'block')" class="tab-button tab-selected">Cadastro</button>
        <button onclick="openTab(1,'block')" class="tab-button tab-unselected">Clientes</button>
    </div>

    <div id="tabs">
        <section id="aba-cadastro">
            <form action="clientes" method="post" autocomplete="off" id="cadastro-cliente">
                <img src="{{ asset('img/watermark.png') }}" alt="" style="width:150px">
                @csrf

                <input type="text" name="nome" id="nome" placeholder="Insira o nome" class="cliente-input">
                <input type="text" name="email" id="email" placeholder="Insira o email" class="cliente-input">
                <input type="text" name="telefone" id="telefone" placeholder="Insira o telefone" class="cliente-input">
                <select name="tp_cliente" class="cliente-input cliente-btn">
                    <option value="proprietario">Proprietario</option>
                    <option value="cliente">Cliente</option>
                </select>
                <input type="text" name="cod_imovel" id="idImovel" placeholder="Insira o código do Imovel" class="cliente-input">

                <button type="submit" class="cliente-input cliente-btn">Cadastrar</button>
            </form>
        </section>

        <section id="aba-clientes">
            <table cellspacing="0" id="client-table">

                <thead class="table-header" cellspacing="0">
                    <!-- <th class="table-title"></th> -->
                    <th class="table-title">Nome</th>
                    <th class="table-title">Email</th>
                    <th class="table-title">Telefone</th>
                    <th class="table-title">Tipo Cliente</th>
                    <th class="table-title">Código do Imovel</th>
                </thead>

                @foreach ($clientes as $cli)
                    <tr class="table-body solved">
                        <td class="body-info divider-left information-{{$cli->id}}" >{{$cli->nome}}</td>
                        <td class="body-info divider-left information-{{$cli->id}}" >{{ $cli->email }}</td>
                        <td class="body-info divider-left information-{{$cli->id}}" >{{ $cli->telefone }}</td>
                        <td class="body-info divider-left information-{{$cli->id}}" >{{ $cli->tp_cliente }}</td>
                        <td class="body-info divider-left information-{{$cli->id}}" >{{ $cli->cod_imovel }}</td>
                    </tr>
                @endforeach
            </table>
        </section>

    </div>


    <script>
    //sistema de abas
    const abas = [
        document.getElementById('aba-cadastro'),
        document.getElementById('aba-clientes')
    ]
    const botoes = document.getElementsByClassName('tab-button')


    openTab(0,'block')

    function clearAll() {
        for(let i=0; i<abas.length; i++)  {
            abas[i].style.display = "none"
        }
    }

    function openTab(index, displayType) {
        clearAll()
        selectTab(index)
        abas[index].style.display = displayType
    }

    //efeito visual na aba
    function selectTab(index) {
        unselectAll()

        botoes[index].classList.replace('tab-unselected','tab-selected')
    }
    function unselectAll() {

        for(i=0; i<botoes.length; i++) {
            botoes[i].classList.replace('tab-selected','tab-unselected')
        }
    }



    // REMOVER ESSA LINHA DEPOIS
</script>

@endsection

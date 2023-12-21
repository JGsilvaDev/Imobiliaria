@extends('layouts.font_import')

@section('title','Cadastrar Cliente')

@section('content')

    @if(Session::has('warning'))
        <div class="alert alert-warning">
            {{ Session::get('warning') }}
        </div>
    @endif
    <link rel="stylesheet" href="{{ asset('css/cadastro-cliente.css') }}">

    <div id="tab-buttons">
        <button onclick="openTab(0,'block')" class="tab-button tab-selected">Cadastro</button>
        <button onclick="openTab(1,'block')" class="tab-button tab-unselected">Clientes</button>
    </div>

    <div id="tabs">
        <section id="aba-cadastro">
            <form action="clientes" method="post" autocomplete="off" id="cadastro-cliente">
                @csrf
        
                <input type="text" name="nome" id="nome" placeholder="Insira o nome" class="cliente-input">
                <input type="text" name="email" id="email" placeholder="Insira o email" class="cliente-input">
                <input type="text" name="telefone" id="telefone" placeholder="Insira o telefone" class="cliente-input">
                <select name="tp_cliente" class="cliente-input cliente-btn">
                    <option value="proprietario">Proprietario</option>
                    <option value="cliente">Cliente</option>
                </select>
                <input type="number" name="idImovel" id="idImovel" placeholder="Insira o id do Imovel" class="cliente-input">
        
                <button type="submit" class="cliente-input cliente-btn">Cadastrar</button>
            </form>
        </section>

        <section id="aba-clientes">
            <h2>Aqui vai a lista de clientes</h2>
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
</script>

@endsection

@extends('layouts.layout_navbar')

@section('title','Anuncie conosco')

@section('content')

<link rel="stylesheet" href="{{ asset('css/font-standards.css') }}">
<link rel="stylesheet" href="{{ asset('css/contato.css') }}">

    <div id="modalContato" class="contato-container">
        <div id="contato-titulo">
            <h1 class="contato-title">Fale conosco!</h1>
        </div>

        <form action="/anuncio" method="POST" id="contato-content" autocomplete="off">
            <h1>Eu quero!</h1>
            <h1 style="color:gray">Imóvel em Pindamonhangaba, fora da região somente sob consulta.</h1>
            @csrf

            <p>Finalidade</p>
            <select name="finalidade" id="" class="contato-input">
                <option value="Vender" selected>Vender</option>
                <option value="Alugar">Alugar</option>
            </select>

            <p>Valor</p>
            <input type="number" name="valor" id="" class="contato-input" placeholder="Insira o valor do imóvel">

            <p>Dados do proprietário</p>
            <input type="text" name="nome" id="" class="contato-input" placeholder="nome" required>
            <input type="text" name="telefone" id="" class="contato-input" placeholder="telefone" required>
            <input type="email" name="email" id="" class="contato-input" placeholder="email">

            <p>Dados do imóvel</p>
            <select name="tpImovel" id="" class="contato-input">
                <option value="Residencial" selected>Residencial</option>
                <option value="Comercial">Comercial</option>
            </select>

            <input type="text" name="condominio" id="" class="contato-input" placeholder="Condomínio">
            <input type="text" name="endereco" id="" class="contato-input" placeholder="Endereço" required>
            <input type="text" name="bairro" id="" class="contato-input" placeholder="Bairro" required>
            <input type="text" name="cidade" id="" class="contato-input" placeholder="Cidade">
            <textarea name="observacao" id="" cols="30" rows="10" class="contato-input" style="resize:none" placeholder="Observação" required></textarea>

            <button class="contato-enviar">Enviar</button>

        </form>
    </div>

@endsection

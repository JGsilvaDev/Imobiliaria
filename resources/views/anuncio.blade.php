@extends('layouts.layout_navbar')

@section('title','Anuncie conosco')

@section('content')

<link rel="stylesheet" href="{{ asset('css/font-standards.css') }}">
<link rel="stylesheet" href="{{ asset('css/contato.css') }}">

    <div id="modalContato" class="contato-container">
        <div id="contato-titulo">
            <h1 class="contato-title">Fale conosco!</h1>
        </div>

        <h1>Eu quero!</h1>
        <form action="/contato" method="POST" id="contato-content" autocomplete="off">
            @csrf

            <p>Finalidade</p>
            <select name="" id="" class="contato-input">
                <option value="" selected>Vender</option>
                <option value="">Alugar</option>
            </select>

            <p>Valor</p>
            <input type="number" name="" id="" class="contato-input" placeholder="Insira o valor do imóvel">

            <p>Dados do proprietário</p>
            <input type="text" name="" id="" class="contato-input" placeholder="nome" required>
            <input type="text" name="" id="" class="contato-input" placeholder="telefone" required>
            <input type="email" name="" id="" class="contato-input" placeholder="email">

            <p>Dados do imóvel</p>
            <select name="" id="" class="contato-input">
                <option value="" selected>Residencial</option>
                <option value="">Comercial</option>
            </select>

            <input type="email" name="" id="" class="contato-input" placeholder="Condomínio">
            <input type="text" name="" id="" class="contato-input" placeholder="Endereço" required>
            <input type="text" name="" id="" class="contato-input" placeholder="Bairro" required>
            <input type="email" name="" id="" class="contato-input" placeholder="Cidade">
            <textarea name="mensagem" id="" cols="30" rows="10" class="contato-input" style="resize:none" placeholder="Observação" required></textarea>

            <button class="contato-enviar">Enviar</button>

        </form>
    </div>

@endsection

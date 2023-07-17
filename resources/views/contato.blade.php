@extends('layouts.layout_navbar')

@section('title','Contato')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/contato.css') }}">
    <div class="contato-container">
        <h1 class="contato-title">Fale conosco!</h1>
        <form action="" id="contato-content" autocomplete="off">
            <input type="text" name="" id="" class="contato-input" placeholder="nome">
            <input type="text" name="" id="" class="contato-input" placeholder="telefone">
            <input type="email" name="" id="" class="contato-input" placeholder="email">
            <textarea name="" id="" cols="30" rows="10" class="contato-input" style="resize:none" placeholder="mensagem"></textarea>
            <button class="contato-enviar">enviar</button>
        </form>
    </div>

    {{-- <p id="voltar-btn"><a href="#">Voltar para página inicial</a></p> --}}
@endsection

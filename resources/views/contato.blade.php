@extends('layouts.layout_navbar')

@section('title','Contato')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/contato.css') }}">
    <div id="contato-container">
        <h1>Contato</h1>
        <p id="contato-email">imobiliaria@email.com</p>
        <p id="contato-instagram">@imobiliaria.2020</p>
        <p id="contato-telefone">3101-9572</p>
        <p id="contato-whatsapp">(12) 99746-5262</p>
    </div>

    {{-- <p id="voltar-btn"><a href="#">Voltar para página inicial</a></p> --}}
@endsection

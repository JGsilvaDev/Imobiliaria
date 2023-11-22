@extends('layouts.layout_navbar')

@section('title','Termos de serviço')

@section('content')
    <div class="background-blur">

        <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    
        <h1 class="about-title">Saiba mais sobre a imobiliária Eunice Solowski</h1>
    
        <section id="sobre-mim">
            <div class="sobre-content">
                <div class="image-container">
                    <img class="imgSobre" src="{{ asset('img/logo.png') }}" alt="">
                </div>
                <div id="sobre-texto">
                    <p>[TEXTO TERMOS DE SERVIÇO]<br><br>
                </div>
            </div>
        </section>
    </div>

@endsection

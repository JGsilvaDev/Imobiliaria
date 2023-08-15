@extends('layouts.layout_navbar')

@section('title','Sobre nós')

@section('content')
    <div class="background-blur">

        <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    
        <h1 class="about-title">Saiba mais sobre a imobiliária Eunice Solowski</h1>
    
        
        <section id="sobre-mim">
            <div class="sobre-content">
                <h1 id="ola" class="about-subtitle">Muito prazer, seja bem-vindo!</h1>
                <div class="image-container">
                    <img class="imgSobre" src="{{ asset('img/logo.png') }}" alt="">
                </div>
                <div id="sobre-texto">
                    <p>Somos sua porta de entrada para encontrar o lar dos seus sonhos. Com expertise no mercado imobiliário e um toque pessoal, estamos aqui para tornar sua busca por propriedades uma experiência empolgante e descomplicada. <br><br>
        
                    Nossa equipe apaixonada entende o significado de encontrar um espaço que se encaixa perfeitamente com seus desejos e necessidades. Seja a busca por um novo lar ou oportunidades de investimento, nossa abordagem ágil e transparente vai direto ao ponto, economizando seu tempo e energia. <br><br>
                        
                    Na Imobiliária Eunice Solowski, acreditamos em relações genuínas. Construímos nosso nome com base na confiança, integridade e resultados. Estamos aqui para dar vida aos seus planos imobiliários de maneira direta e eficaz. <br><br>
                        
                    Explore nosso site para descobrir nossa seleção de propriedades e entre em contato para dar o próximo passo emocionante na sua jornada imobiliária. <br><br></p>
                </div>
            </div>
        </section>
    
        <hr class="divisor">
    
        {{-- <h1 class="about-subtitle">Depoimentos sobre a corretora</h1>
        <section id="depoimentos">
            <div class="pessoa">
                <img src="{{ asset('img/gabriel.png') }}" alt="">
                <p>Gabriel silva</p>
            </div>
            <div class="pessoa">
                <img src="{{ asset('img/gabriel.png') }}" alt="">
                <p>Gabriel silva</p>
            </div>
            <div class="pessoa">
                <img src="{{ asset('img/gabriel.png') }}" alt="">
                <p>Gabriel silva</p>
            </div>
        </section> 
    
        <hr class="divisor"> --}}
    
        <section id="aviso">
            <h2>Aviso sobre valores</h2>
            <hr class="divisor-aviso">
            <p>Em alguns casos, os preços podem variar dependendo do imóvel. Em caso de dúvida, entre em contato com a imobiliária antes de realizar a compra.</p>
        </section>
    </div>

@endsection

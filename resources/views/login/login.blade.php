@extends('layouts.main')

@section('title','Login')

@section('content')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<div class="login-container">
    <form class="login-content" action="login" method="POST">
        @csrf
        <img src="{{ asset('img/icone.png') }}" alt="" class="icone">
        <h1 id="login-welcome">BEM VINDO(A)!</h1>

        <input type="text" id="login-input-email" name="email" class="input-log" placeholder="Digite seu email">

        <input type="password" id="login-input-password" class="input-log" placeholder="Digite sua senha" name="senha">

        <button id="btn-logar" class="btn-reg">Entrar</button>
        <p id="no-account"><a href="/cadastro">Ainda não tem uma conta?</a></p>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($erro)
            <div class="alert alert-danger">
                {{ $erro }}
            </div>
        @endif
    </form>
</div>

@endsection

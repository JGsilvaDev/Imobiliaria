@extends('layouts.main')

@section('title','Login')

@section('content')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<button id="voltar-btn" onclick="window.location.href = '/'"><span class="material-symbols-outlined">undo</span></button>

<div class="login-container">
    <form class="login-content" action="login" method="POST">
        @csrf
        <div class="img" style="background-image: url('{{ asset('img/icone.png') }}')"></div>
        <p id="login-welcome">BEM VINDO(A)!</p>

        <input type="text" id="login-input-email" name="email" class="input-log" placeholder="Digite seu email">

        <input type="password" id="login-input-password" class="input-log" placeholder="Digite sua senha" name="senha">

        @if($errors->any())
            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
            </div>
        @endif
        @if($erro)
            <div class="alert alert-danger">
                {{ $erro }}
            </div>
        @endif
        <button id="btn-logar" class="btn-reg">Entrar</button>
    </form>
</div>

@endsection

@extends('layouts.main_login')

@section('title','Login')

@section('content')

<div class="login-container">
    <form class="login-content" action="login" method="POST">
        @csrf
        <h1 id="login-welcome">BEM VINDO(A)!</h1>

        <input type="text" id="login-input-email" name="email" class="input-log" placeholder="Digite seu email">

        <input type="password" id="login-input-password" class="input-log" placeholder="Digite sua senha" name="senha">

        <p id="forgot-password"><a href="#">Esqueci minha senha</a></p>

        <button id="btn-logar" class="btn-reg">Entrar</button>
        <p id="no-account"><a href="#">Ainda não tem uma conta?</a></p>

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
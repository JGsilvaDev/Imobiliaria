@extends('layouts.main_login')

@section('title','Cadastro')

@section('content')

    <div class="login-container">
        <form action="cadastro" class="register-content" method="POST">
            @csrf
            <h1>Por favor, cadastre-se</h1>

            <p>Por favor, forneça todas as informações necessárias para concluir o cadastro.</p>

            <div class="registro-input-layout">
                <input type="text" autocomplete="off" name="nome" id="cadastro-nome" class="input-reg" placeholder="Insira seu nome">
                <input type="tel" autocomplete="off" id="cadastro-celular" placeholder="12 999999999" class="input-reg" maxlength="12" required>
            </div>

            <div class="registro-input-layout">
                <input type="email" autocomplete="off" id="email" class="input-reg" placeholder="Insira seu email" name="email" required>
                <input type="email" autocomplete="off" id="email_conf" class="input-reg" placeholder="Confirme seu email" name="email_conf" required>
            </div>

            <div class="registro-input-layout">
                <input type="password" autocomplete="off" id="cadastro-senha" class="input-reg" placeholder="Insira sua senha" name="senha" require>
                <input type="password" autocomplete="off" id="cadastro-conf-senha" class="input-reg" placeholder="Confirme sua senha" name="confirmSenha" require>
            </div>

            <button id="btn-registrar" class="btn-reg">Cadastrar</button>

            @if($erro)
                <div class="alert alert-danger">
                    {{ $erro }}
                </div>
            @endif

        </form>
    </div>

@endsection

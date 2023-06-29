<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/user-edit.css') }}">
    <title>Usuario</title>
</head>
<body>
    <div id="user-dados">
        <form id="user-container" action="/admin/editUsuario" method="POST">
            @csrf
            <img src="./pfp.png" alt="" id="user-picture" width="300px">

            <div class="user-input-container">
                <input type="text" name="nome" id="user-name" class="user-input" value="{{ $usuario->name }}" placeholder="Nome de usuário">
                <img src="{{ asset('img/edit-icon.svg') }}" class="svg-icon" alt="" >
            </div>
            <div class="user-input-container">
                <input type="text" name="telefone" id="user-fone" class="user-input" value="{{ $usuario->telefone }}" placeholder="Telefone">
                <img src="{{ asset('img/edit-icon.svg') }}" class="svg-icon" alt="" >
            </div>
            <div class="user-input-container">
                <input type="email" name="email" id="user-mail" class="user-input" value="{{ $usuario->email }}" placeholder="Email">
                <img src="{{ asset('img/edit-icon.svg') }}" class="svg-icon" alt="" >
            </div>

            <button type="submit" id="btn-salvar" class="user-btn">Salvar</button>
        </form>
    </div>

    <form id="user-options" action="logout" method="POST">
        @csrf
        <button class="nav-btn" id="sair" type="submit">Sair</button>
    </form>

</body>
</html>

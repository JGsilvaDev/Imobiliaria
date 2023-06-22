<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <div class="container">
        <form action="cadastro" method="POST">
            @csrf
            <h1>Cadastro</h1>

            <label>Nome</label>
            <input type="text" autocomplete="off" id="nome" name="nome" required>

            <label>Telefone</label>
            <input type="tel" autocomplete="off" id="telefone" name="telefone" placeholder="12 991574256" maxlength="12" required>

            <label>E-mail</label>
            <input type="email" autocomplete="off" id="email" name="email" required>

            <label>Senha</label>
            <input type="password" autocomplete="off" id="senha" name="senha" required>

            <label>Confirmação de Senha</label>
            <input type="password" autocomplete="off" id="confirmSenha" name="confirmSenha" required>

            <button type="submit">Criar</button>

            @if($erro)
                <div class="alert alert-danger">
                    {{ $erro }}
                </div>
            @endif

        </form>
    </div>
</body>
</html>

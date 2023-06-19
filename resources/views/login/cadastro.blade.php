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
            <input type="text" autocomplete="off" id="nome" name="nome">

            <label>E-mail</label>
            <input type="email" autocomplete="off" id="email" name="email">

            <label>Senha</label>
            <input type="password" autocomplete="off" id="senha" name="senha">

            <!-- <label>Confirmação de Senha</label>
            <input type="password" autocomplete="off"> -->

            <button type="submit">Criar</button>

        </form>
    </div>
</body>
</html>

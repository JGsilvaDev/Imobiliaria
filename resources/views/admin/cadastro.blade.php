<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Produto</title>
</head>
<body>
    <h1>Tela que vai os drops downs para cadastrar</h1>
    <div class="container">
        <h3>Terreno</h3>
        <form action="cadastrar" method="post">
            @csrf
            <input type="hidden" name="id_produto" value="1">

            <label>Titulo</label>
            <input type="text" name="titulo" id="titulo">

            <label>Descrição</label>
            <input type="text" name="descricao" id="descricao">

            <label>Area</label>
            <input type="text" name="area" id="area">

            <label>Valor</label>
            <input type="text" name="valor" id="valor">

            <label>Imagem</label>
            <input type="text" name="imagem" id="imagem">

            <button type="submit">Enviar</button>
        </form>
    </div>

    <div class="container">
        <h3>Casa</h3>
        <form action="cadastrar" method="post">
            @csrf
            <input type="hidden" name="id_produto" value="2">

            <label>Titulo</label>
            <input type="text" name="titulo" id="titulo">

            <label>Descrição</label>
            <input type="text" name="descricao" id="descricao">

            <label>Area</label>
            <input type="text" name="area" id="area">

            <label>Valor</label>
            <input type="text" name="valor" id="valor">

            <label>Imagem</label>
            <input type="text" name="imagem" id="imagem">

            <button type="submit">Enviar</button>
        </form>
    </div>

    <div class="container">
        <h3>Apartamento</h3>
        <form action="cadastrar" method="post">
            @csrf
            <input type="hidden" name="id_produto" value="3">

            <label>Titulo</label>
            <input type="text" name="titulo" id="titulo">

            <label>Descrição</label>
            <input type="text" name="descricao" id="descricao">

            <label>Area</label>
            <input type="text" name="area" id="area">

            <label>Valor</label>
            <input type="text" name="valor" id="valor">

            <label>Imagem</label>
            <input type="text" name="imagem" id="imagem">

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>

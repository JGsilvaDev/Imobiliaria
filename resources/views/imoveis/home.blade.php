<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imoveis</title>
</head>
<body>
    <h1>Todos os imoveis</h1>

    <form action="imoveis" method="post">
        @csrf
        <input type="text" name="search" id="search" placeholder="Pesquisar imóvel">
    </form>

    @foreach ($imoveis as $item)
        <p>{{ $item->titulo }}</p>
        <p>{{ $item->localidade }}</p>
        <p>{{ $item->area }}</p>
        <p>{{ $item->valor }}</p>
        <p>{{ $item->descricao }}</p>
        <p>{{ $item->path }}</p>

        <br>
    @endforeach
</body>
</html>

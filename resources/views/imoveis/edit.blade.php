<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalhe Produto</title>
</head>
<body>
 <h1>Detalhes produto {{ $detalhes->id}}</h1>

    @foreach ($imagens as $path)
        @if($detalhes->id == $path->chave)
            <img src="{{asset($path->path)}}" alt="Imagem">
        @endif
    @endforeach

    @if ($detalhes->descricao == "Terreno")
        <p>{{ $detalhes->id }}</p>
        <p>{{ $detalhes->descricao }}</p>
        <p>{{ $detalhes->titulo }}</p>
        <p>{{ $detalhes->localidade }}</p>
        <p>{{ $detalhes->area }}</p>
        <p>{{ $detalhes->valor }}</p>

    @else
        <p>{{ $detalhes->id }}</p>
        <p>{{ $detalhes->descricao }}</p>
        <p>{{ $detalhes->titulo }}</p>
        <p>{{ $detalhes->qtdBanheiros }}</p>
        <p>{{ $detalhes->qtdVagas }}</p>
        <p>{{ $detalhes->qtdQuartos }}</p>
        <p>{{ $detalhes->area }}</p>
        <p>{{ $detalhes->valor }}</p>
    @endif
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Imovel</title>
</head>
<body>
    <h1>Editando</h1>
    <form action="/salvar/{{ $item->id }}" method="post" enctype="multipart/form-data">
        @csrf
        <label>Tipo de Produto</label>
        @if ($item->id_tp_produto == 1)
            <select name="id_tp_produto" id="id_tp_produto">
                <option value="1" selected>Terreno</option>
                <option value="2">Casa</option>
                <option value="3">Apartamento</option>
            </select>
        @elseif($item->id_tp_produto == 2)
            <select name="id_tp_produto" id="id_tp_produto">
                <option value="1">Terreno</option>
                <option value="2" selected>Casa</option>
                <option value="3">Apartamento</option>
            </select>
        @else
            <select name="id_tp_produto" id="id_tp_produto">
                <option value="1">Terreno</option>
                <option value="2">Casa</option>
                <option value="3" selected>Apartamento</option>
            </select>
        @endif

        <label>Titulo</label>
        <input type="text" name="titulo" id="titulo" value="{{ $item->titulo }}">

        <label>Descrição</label>
        <input type="text" name="descricao" id="descricao" value="{{ $item->descricao }}">

        <label>Area</label>
        <input type="text" name="area" id="area" value="{{ $item->area }}">

        <label>Valor</label>
        <input type="text" name="valor" id="valor" value="{{ $item->valor }}">

        <label>Localidade</label>
        <input type="text" name="localidade" id="localidade" value="{{ $item->localidade }}">

        <label>Imagens</label>
        <input type="file" name="imagem[]" id="imagem" multiple required>

        <button type="submit">Salvar</button>
    </form>

    @foreach ($imagem as $img)
        <form action="/deletar/img/{{ $img->id }}" method="post">
            @csrf
            @method('DELETE')
            <img src="{{ env('APP_URL') }}{{asset($img->path)}}" alt="Imagem">
            <button type="submit">Excluir</button>
        </form>
    @endforeach

    @if(session('excluir'))
        <div class="alert alert-success flash-message">
            {{ session('excluir') }}
        </div>
    @endif

</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/cadastro-imovel.css') }}">
    <title>Edit Imovel</title>
</head>
<body>
    <h1>Editando</h1>
    <form action="/salvar/{{ $item->id }}" method="post" enctype="multipart/form-data" class="add-layout">
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

        <!-- <label>Titulo</label> -->
        <!-- <input type="text" name="titulo" id="titulo" value="{{ $item->titulo }}"> -->
        <p for="" id="titulo-label" class="add-label">Título</p>
        <input type="text" id="casa-titulo-input" name="titulo" class="add-input" value="{{ $item->titulo }}" required>

        <!-- <label>Descrição</label>
        <input type="text" name="descricao" id="descricao" value="{{ $item->descricao }}"> -->
        <p for="" id="desc-label" class="add-label">Descrição</p>

        <textarea name="descricao" id="casa-desc-input" cols="30" rows="10" class="add-input" required>{{ $item->descricao }}</textarea>

        <label class="add-label">Area</label>
        <input type="text" name="area" id="area" value="{{ $item->area }}" class="add-input">

        <label class="add-label">Valor</label>
        <input type="text" name="valor" id="valor" value="{{ $item->valor }}" class="add-input">

        <label class="add-label">Localidade</label>
        <input type="text" name="localidade" id="localidade" value="{{ $item->localidade }}" class="add-input">

        <label class="add-label">Imagens</label>
        <input type="file" name="imagem[]" id="imagem" multiple required>
        
        <button type="submit">Salvar</button>
    </form>
    <!-- imagens -->
    <label class="img-title-label">Imagens</label>
    <div class="image-list-container">
        @foreach ($imagem as $img)
            <form action="/deletar/img/{{ $img->id }}" method="post" class="image-list-content">
                @csrf
                @method('DELETE')
                <div class="edit-img-frame" style="background-image: url('{{asset($img->path)}}')"></div>
                <button type="submit" class="btn-delete-image">Excluir</button>
                <!-- <img src="{{asset($img->path)}}" alt="Imagem"> -->
            </form>
        @endforeach
    </div>


    @if(session('excluir'))
        <div class="alert alert-success flash-message">
            {{ session('excluir') }}
        </div>
    @endif

</body>
</html>

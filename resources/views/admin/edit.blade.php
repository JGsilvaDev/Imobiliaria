<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/cadastro-imovel.css') }}">
    <script src="{{ asset('js/softDelete.js') }}"></script>
    <script src="{{ asset('js/imagemEdit.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Edit Imovel</title>
</head>
<body>
    <h1>Editando</h1>
    <form action="/salvar/{{ $item->id }}" method="post" enctype="multipart/form-data" class="add-layout">
        @csrf
        <p for="" id="titulo-label" class="add-label">Título</p>
        <input type="text" id="casa-titulo-input" name="titulo" class="add-input" value="{{ $item->titulo }}" required>

        <p for="" id="desc-label" class="add-label">Descrição</p>

        <textarea name="descricao" id="casa-desc-input" cols="30" rows="10" class="add-input" required>{{ $item->desc }}</textarea>

        <label class="add-label">Area</label>
        <input type="text" name="area" id="area" value="{{ $item->area }}" class="add-input">

        <label class="add-label">Valor</label>
        <input type="text" name="valor" id="valor" value="{{ $item->valor }}" class="add-input">

        <label class="add-label">Localidade</label>
        <input type="text" name="localidade" id="localidade" value="{{ $item->localidade }}" class="add-input">

        <label class="add-label">Inserir novas Imagens</label>
        <input type="file" name="imagem[]" id="imagemEdit" multiple>

        <input type="file" name="imagemEditPrincipal" id="imagemEditPrincipal" style="display: none">

        <div id="imagemPreviewEdit"></div>

        <button type="submit" id="salvar">Salvar</button>
    </form>

    <label>Imagem Principal</label>
    <div class="edit-img-frame" style="background-image: url('{{ asset($imagemPrincipal->path) }}')"></div>

    <label class="img-title-label">Imagens</label>
    @foreach ($imagem as $img)
        @if ($item->id == $img->chave)
            <div class="image-list-container">
                <div class="edit-img-frame" style="background-image: url('{{ asset($img->path) }}')"></div>
                <input type="hidden" name="id" value="{{ $img->id }}">
                <button id="bntTrocarPrincipal" onclick="trocarPrincipal(this)">Trocar</button>
                <button id="imovel-remover" onclick="excluir(this);" class="btn-delete-image">Excluir</button>
            </div>
        @endif
    @endforeach

    @if(session('excluir'))
        <div class="alert alert-success flash-message">
            {{ session('excluir') }}
        </div>
    @endif

</body>
</html>

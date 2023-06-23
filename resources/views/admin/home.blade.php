<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <title>Home Admin</title>
</head>
<body>
    <h1>Tela home admin</h1>

    <form action="logout" method="POST">
        @csrf
        <button type="submit">Sair</button>
    </form>

    <form action="admin" method="post">
        @csrf
        <input type="text" name="search" id="search">
    </form>

    @if($itens)
        @foreach($itens as $item)
        <div id="conteudo">
            <p>{{ $item->id }}</p>
            <p>{{ $item->titulo }}</p>
            <p>{{ $item->descricao }}</p>
            <p>{{ $item->area }}</p>
            <p>{{ $item->valor }}</p>

            @if($paths[0]->id != 0)
                @foreach ($paths as $path)
                    @if($item->id == $path->id)
                        <img src="{{ env('APP_URL') }}{{asset($path->path)}}" alt="Imagem">
                        @break
                    @endif
                @endforeach
            @endif

            <form action="admin/edit/{{ $item->id }}" method="post">
                @csrf
                <button type="submit">Editar</button>
            </form>

            <form action="/deletar/{{ $item->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button id="btnDelete" onclick="deletar(this)">Deletar</button>
            </form>
        </div>
        @endforeach
    @endif

    @if(session('success'))
        <div class="alert alert-success flash-message">
            {{ session('success') }}
        </div>
    @endif

    @if(session('editado'))
        <div class="alert alert-success flash-message">
            {{ session('editado') }}
        </div>
    @endif

    @if(session('excluir'))
        <div class="alert alert-success flash-message">
            {{ session('excluir') }}
        </div>
    @endif

    @if(session('id'))
        <div class="alert alert-danger">
            Usuario id: {{ session('id') }}
        </div>
    @endif
</body>
</html>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

            <form action="admin/edit" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $item->id }}">
                <button type="submit">Editar</button>
            </form>

        @endforeach
    @endif

    @if(session('success'))
        <div class="alert alert-success flash-message">
            {{ session('success') }}
        </div>
    @endif

    @if(session('id'))
        <div class="alert alert-danger">
            {{ session('id') }}
        </div>
    @endif
</body>
</html>


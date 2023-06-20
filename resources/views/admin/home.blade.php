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

    @foreach($itens as $item)
        <p>{{ $item->titulo }}</p>
        <p>{{ $item->descricao }}</p>
        <p>{{ $item->area }}</p>
        <p>{{ $item->valor }}</p>
        <p>{{ $item->imagens }}</p>
    @endforeach

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


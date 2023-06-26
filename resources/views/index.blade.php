<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Welcome</h1>

    @if(session('email'))
        <div class="alert alert-success flash-message">
            {{ session('email') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/enviarEnviar" method="POST">
        @csrf

        <label>Nome</label>
        <input type="text" name="nome" id="nome" autocomplete="off">

        <label>Telefone</label>
        <input type="tel" autocomplete="off" id="telefone" name="telefone" placeholder="12 991574256" maxlength="12">


        <label>Email:</label>
        <input type="email" name="email" id="email" autocomplete="off">

        <label>Mensagem</label>
        <textarea name="descEmail" id="descEmail" cols="30" rows="10" autocomplete="off"></textarea>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>

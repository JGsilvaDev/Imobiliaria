<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <div class="container">
        <form action="login" method="POST">
            @csrf
            <h1>Login</h1>

            <label>E-mail</label>
            <input type="text" id="email" name="email">

            <label>Senha</label>
            <input type="password" id="senha" name="senha">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
            @endif

            <button type="submit">Acessar</button>
        </form>
    </div>
</body>
</html>

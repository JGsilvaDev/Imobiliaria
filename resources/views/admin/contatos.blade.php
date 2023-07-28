<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($contatos as $cont)
        <div>
            <p>{{ $cont->nome }}</p>
            <p>{{ $cont->telefone }}</p>
            <p>{{ $cont->email }}</p>
            <p>{{ $cont->motivoContato }}</p>
        </div>
    @endforeach
</body>
</html>

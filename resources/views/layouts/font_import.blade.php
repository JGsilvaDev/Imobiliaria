<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500;700&display=swap" rel="stylesheet">
    
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('img/favicon-16x16.png') }}" type="image/fav-icon">
</head>
<body>
    @yield('content')
</body>
</html>
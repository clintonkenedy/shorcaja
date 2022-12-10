<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tickets</title>
    <link rel="stylesheet" href="{{asset('css/buscador.css')}}">
    <link rel="stylesheet" href="{{asset('css/buscadorname.css')}}">
    <link rel="stylesheet" href="{{asset('css/buscadorticket.css')}}">
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
    @yield('css')
</head>
<body>

@yield('content')


@yield('js')


</body>
</html>

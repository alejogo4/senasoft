<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="Sitio Web - Senasoft 2019">

    <title>@yield('title')</title>

    <!--Librerias del head que usa la plantilla-->
    @yield('librariesTop',View::make('layouts.components.librariesTop'))

</head>

<body>

    @yield('content')


<!--Librerias del head que usa la plantilla-->
@yield('libreriasBottom',View::make('layouts.components.librariesBottom'))
</body>
</html>

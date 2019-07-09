<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="Sitio Web - Senasoft 2019">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>SENASOFT 2019</title>

    <!--Librerias del head que usa la plantilla-->
    @yield('librariesTop',View::make('layouts.components.librariesTop'))
    @yield('style')

    <style>
        li.dropdown:hover > .dropdown-menu {
            display: block;
        }
    </style>
</head>

<body>

    @yield('content')


    <!--Librerias del head que usa la plantilla-->
    @yield('libreriasBottom',View::make('layouts.components.librariesBottom'))
    @yield('script')
</body>

</html>

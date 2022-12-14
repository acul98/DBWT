<!DOCTYPE html>
<hmtl lang="de">
    <head>
        @yield('head')
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body>
    <div class="header">
        @yield('header')
    </div>
    <div class="home">
        @yield('home')
    </div>
    <div id="anmeldung">
        @yield('Anmelden')
    </div>
    <div class="main">
        @yield('main')
    </div>
    <div class="Galerie">
        @yield('Galerie')
    </div>
    <div class="footer">
        @yield('footer')
    </div>
    </body>
</hmtl>
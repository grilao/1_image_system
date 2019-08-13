<!doctype html>

<html>

    <head>

        <meta charset="utf-8">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ asset('css/main.css') }}" crossorigin="anonymous">
        <link href="//fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800" 
rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    </head>

    <body>

        <div class="container">
            
            @include('layout.nav')

            @yield('content')
        
        </div>

    </body>

</html>
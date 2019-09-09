<!doctype html>

<html>

    <head>

        <meta charset="utf-8">

        <title>@yield('title')</title>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script>
        <link rel="stylesheet" href="{{ asset('css/main.css') }}" crossorigin="anonymous">
        <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
        <link href="//fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800" 
rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" crossorigin="anonymous">

        <!-- Caman Js -->
        <script src="http://ajax.cdnjs.com/ajax/libs/camanjs/2.0/caman.full.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/camanjs/4.1.2/caman.full.min.js"></script>
        
    </head>

    <body>
            
        @include('layout.nav')

        @yield('content')

        <div class="fundo"></div>

    </body>

</html>
@extends ('layout.layout')

@section('title')

    Ajuda

@endsection

@section ('content')

    <script>
        Caman('#image', function () {
            this.brightness(20);
            this.contrast(10);
            this.saturation(100);
            this.render( function() {
                this.save("'/xamppimages/Koala_editado.png') }}")
            });
        });
    </script>

    <div class="container-ajuda">
        <img id="image" src="{{ asset('images/Koala.jpg') }}">
        <br clear="all">
    </div>
@endsection
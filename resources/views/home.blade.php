@extends ('layout.layout')

@section('title')

    Ajuda

@endsection

@section ('content')

    <script>
        Caman('#image', function () {
            this.brightness(80);
            this.contrast(90);
            this.saturation(90);
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
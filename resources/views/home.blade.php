@extends ('layout.layout')

@section('title')

    Ajuda

@endsection

@section ('content')

    <script>
        Caman('#image', function () {
            this.brightness(19);
            this.contrast(20);
            this.saturation(12);
            this.render( function() {
                this.save("'/xampp/images/Koala_editado.png') }}")
            });
        });
    </script>

    <div class="container-ajuda">
        <img id="image" src="{{ asset('images/Chrysanthemum.jpg') }}">
        <br clear="all">
    </div>
@endsection
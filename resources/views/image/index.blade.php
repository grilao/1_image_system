@extends ('layout.layout')

@section('title')

    Edição

@endsection

@section ('content')

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br />
    @endif

    <h3 class="h3-main">Imagens</h3>

    @foreach ( $image as $image )
        
        <?php
            $image_certa = $image->filename;
        ?>
        <div class="index">
            <?php
                echo "<p class='index-p'>$image_certa</p>";
            ?>
            <div class="center">
                <a href="{{ route('image.edit', $image->id)}}"><button style="padding-left: 15px; padding-right: 15px; float: left; margin-left: -150px;" class="btn btn-primary" type="submit">Editar</button></a>
                <form style="margin-left: -70px;" action="{{ route('image.destroy', $image->id)}}" method="post">
                @csrf
                @method('DELETE')
                    <button class="btn btn-danger" style="padding-left: 15px; padding-right: 15px;" type="submit">Excluir</button>
                </form>
            </div>
            <hr>
            <div class="index-div">
                <img id="img" src="{{ asset('images/'. $image_certa .'') }}" name="img" class="index-div-img" title="{{$image_certa}}"/>
            </div>
        </div>
    
    @endforeach

    <br clear="all">

@endsection
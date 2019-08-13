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

    <h3>Imagens</h3>

    @foreach ( $image as $image )
        
        <div class="edicao">
            <?php
                $image_certa = $image->filename;
            ?>

            <img src="{{ asset('images/'. $image_certa .'') }}" id="img{{$image->id}}" name="img{{$image->id}}" title="{{$image_certa}}" class="edicao_div_img"/>

            <a href="{{ route('image.edit', $image->id)}}">Editar</a>
            <form action="{{ route('image.destroy', $image->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Excluir</button>
            </form>
        </div>
    
    @endforeach

    <br clear="all">

@endsection
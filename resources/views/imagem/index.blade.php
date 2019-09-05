@extends ('layout.layout')

@section('title')

    Edição

@endsection

@section ('content')

    @if(session()->get('success'))
        <div id="mensagem" class="alert alert-success">
            {{ session()->get('success') }}
        </div><br />
    @endif

    <h3 class="h3-main">Imagens</h3>


    
    @foreach ( $imagem as $imagem )
        
        <?php
            $imagem_certa = $imagem->filename;
        ?>
        <div id="index" class="index">
            <?php
                echo "<p title='$imagem_certa' class='index-p'>$imagem_certa</p>";
            ?>
            <div class="center">
                <a href="{{ route('imagem.edit', $imagem->id)}}"><button style="padding-left: 15px; padding-right: 15px; float: left; margin-left: -137px;" class="btn btn-primary" type="submit">Editar</button></a>
                <form style="margin-left: -60px;" action="{{ route('imagem.destroy', $imagem->id)}}" method="post">
                @csrf
                @method('DELETE')
                    <button class="btn btn-danger" style="padding-left: 15px; padding-right: 15px;" type="submit">Excluir</button>
                </form>
            </div>
            <hr>
            <div class="index-div">
                <img id="img" src="{{ asset('images/'. $imagem_certa .'') }}" name="img" class="index-div-img" title="{{$imagem_certa}}"/>
            </div>
            <div class="index-div-temp">
                <span title="{{$imagem->template}}" style="padding-top: 10px;" class="index-span"><strong>Template: </strong>{{$imagem->template}}</span><br><br>
                @foreach ( $template as $template )
                    @if ( $imagem->template == $template->nome )
                        <span title="{{$template->descricao}}" class="index-span"><strong>Descrição: </strong>{{$template->descricao}}</span>
                    @endif
                @endforeach
            </div>
        </div>
    
    @endforeach

    <a href="aplicarTemplate"><button id="download" style="position: relative; padding-left: 15px; padding-right: 15px; margin-left: 50px;" class="btn btn-primary">Download</button></a>
    <a href="{{ route('imagem.create')}}"><button style="position: relative; padding-left: 15px; padding-right: 15px; margin-left: 10px;" class="btn btn-primary" >Página inicial</button></a>

    <br clear="all">

    <script>
        $(document).ready(function(){
            $('#download').on('click', function(){
                $('.index').css('display', 'none');
                $('#download').css('display', 'none');
                $('#mensagem').text('Imagens compactadas e baixadas com sucesso!');
            });
        });
    </script>
@endsection


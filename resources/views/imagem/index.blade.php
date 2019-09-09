@extends ('layout.layout')

@section('title')

    Imagens

@endsection

@section ('content')
    <div class="container-main">
        @if(session()->get('success'))
            <div id="mensagem" class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif

        <br clear="all">
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
                    <a style="z-index: 99;" href="{{ route('imagem.edit', $imagem->id)}}"><button style="z-index: 99; padding-left: 15px; padding-right: 15px; float: left; margin-left: -137px;" class="btn btn-primary" type="submit">Editar</button></a>
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
                    <span title="{{$imagem->template}}" style="padding-top: 10px; position:relative; top: -50px;" class="index-span"><strong>Template: </strong>{{$imagem->template}}</span><br><br>
                    
                    @foreach ( $template as $temp )
                        @if ( $imagem->template == $temp->nome )
                            <span style="position:relative; top: -50px;" title="{{$temp->descricao}}" class="index-span"><strong>&nbspDescrição: </strong>{{$temp->descricao}}</span>
                        @endif
                    @endforeach
                </div>
            </div>
        
        @endforeach
        <br clear="all">

        <hr style="margin-left: -3%;" class="h3-main">

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
    </div>
@endsection
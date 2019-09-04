@extends ('layout.layout')

@section('title')

    Edição de Imagem

@endsection

@section ('content')
       
    @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <strong>Não foi possível realizar a edição!</strong><br><br>Erros:<br>
            <ul style="list-style: none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('sucesso'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div><br />
    @endif
    <h3 class="h3-main">Edição de Imagem</h3>
    <form method="post" action="{{ route('imagem.update', $imagem->id) }}">
        @method('PATCH')
        @csrf

        <?php
            $image_certa = $imagem->filename;
        ?>
        
        <div class="edicao">
            <?php
                echo "<p class='edicao-p'>$image_certa</p>";
            ?>

            <hr>
            <div class="edicao-div">
                <img id="img" src="{{ asset('images/'. $image_certa .'') }}" name="img" class="edicao-div-img" title="{{$image_certa}}"/>
            </div>

            <div class="edicao-div-edicao">
                <div class="edicao-div-cor">
                    <label class="edicao-div-edicao-label" for="brilho">Brilho:</label>
                    <span class="edicao-div-edicao-span" id="valor_brilho"></span>
                    <input type="range" class="custom-range" id="brilho" value="100" min="0" max="200" name="brilho">
                </div>   
                
                <div class="edicao-div-cor">
                    <label class="edicao-div-edicao-label" for="contraste">Contraste:</label>
                    <span class="edicao-div-edicao-span" id="valor_contraste"></span>
                    <input type="range" class="custom-range" id="contraste" value="100" min="0" max="200" name="contraste">
                </div>

                <div class="edicao-div-cor">
                    <label class="edicao-div-edicao-label" for="saturacao">Saturação:</label>
                    <span class="edicao-div-edicao-span" id="valor_saturacao"></span>
                    <input type="range" class="custom-range" id="saturacao" value="100" min="0" max="200" name="saturacao">
                </div>
            </div>
        </div>
        <div style="position: absolute; left: 40%; width: 300px; top: 82px;" class="edicao-div-temp">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="template">Templates</label>
                </div>
                <select class="custom-select" id="template" name="template">
                @foreach ( $template as $temp )
                    <option value="{{$temp->nome}}">{{$temp->nome}}</option>
                @endforeach
                </select>
            </div>
        </div>
        <button class="btn btn-primary" style="position: absolute; left: 84%; margin-bottom: 20px; top:  82px;" type="submit" style="margin-top:10px">Salvar</button>

    </form>
    <a href="{{ route('imagem.index') }}"><button style="top: 50px; margin-bottom: 50px;" class="btn btn-primary" type="submit" >Voltar</button></a>

    <script>

        $(document).ready(function(){
            $('#valor_brilho').html('0');
            $('#valor_contraste').html('0');
            $('#valor_saturacao').html('0');

            $('input[type=range]').change(function(){

                var brilho = $('#brilho').val();
                var contraste = $('#contraste').val();
                var saturacao = $('#saturacao').val();
                $('#valor_brilho').html(brilho-100);
                $('#valor_contraste').html(contraste-100);
                $('#valor_saturacao').html(saturacao-100);

                var filtros = 'brightness('+ brilho +'%) contrast('+ contraste +'%) saturate('+ saturacao +'%)';
            
                $('#img').css('filter', filtros);

            })
        });

    </script>

    
@endsection
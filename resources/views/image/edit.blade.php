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
    <form method="post" action="{{ route('image.update', $image->id) }}">
        @method('PATCH')
        @csrf

        <?php
            $image_certa = $image->filename;
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
                    <input type="number" class="edicao-div-edicao-input-number" id="brilho_number" value="0">
                </div>   
                
                <div class="edicao-div-cor">
                    <label class="edicao-div-edicao-label" for="contraste">Contraste:</label>
                    <span class="edicao-div-edicao-span" id="valor_contraste"></span>
                    <input type="range" class="custom-range" id="contraste" min="0" max="200" name="contraste">
                    <input type="number"  class="edicao-div-edicao-input-number" id="contraste_number" value="0">
                </div>

                <div class="edicao-div-cor">
                    <label class="edicao-div-edicao-label" for="saturacao">Saturação:</label>
                    <span class="edicao-div-edicao-span" id="valor_saturacao"></span>
                    <input type="range" class="custom-range" id="saturacao" min="0" max="200" name="saturacao">
                    <input type="number"  class="edicao-div-edicao-input-number" id="saturacao_number" value="0">
                </div>
            </div>
        </div>
        <button class="btn btn-primary" style="position: relative; left: 50%; margin-left: -32.91px; margin-bottom: 20px;" type="submit" style="margin-top:10px">Salvar</button>

    </form>
    <a href="{{ route('image.index') }}"><button style="position: relative; left: 50%; margin-left: -32.45px;" class="btn btn-primary" type="submit" >Voltar</button></a>

    <script>

        $(document).ready(function(){
            $('#valor_brilho').html('0');
            $('#valor_contraste').html('0');
            $('#valor_saturacao').html('0');

            $('form').change(function(){

                var brilho = $('#brilho').val();
                var contraste = $('#contraste').val();
                var saturacao = $('#saturacao').val();
                $('#valor_brilho').html(brilho-100);
                $('#valor_contraste').html(contraste-100);
                $('#valor_saturacao').html(saturacao-100);

                var filtros = 'brightness('+ brilho +'%) contrast('+ contraste +'%) saturate('+ saturacao +'%)';
            
                $('#img').css('filter', filtros);

                $('#brilho_number').val(brilho-100);
                $('#contraste_number').val(contraste-100);
                $('#saturacao_number').val(saturacao-100);

            })
        });

    </script>

    
@endsection
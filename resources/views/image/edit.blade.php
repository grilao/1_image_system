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
                <div class="edicao-div">
                    <img id="img" src="{{ asset('images/'. $image_certa .'') }}" name="img" class="edicao-div-img" title="{{$image_certa}}"/>
                </div>

                <div class="edicao-div-edicao">
                    <label class="edicao-div-edicao-label" for="brilho">Brilho:</label>
                    <input type="range" class="edicao-div-edicao-inputs" id="brilho" value="100" min="0" max="200" name="brilho">
                    <input type="number" class="edicao-div-edicao-input-number" id="brilho_number" value="0">
                    <span class="edicao-div-edicao-span" id="valor_brilho"></span>
                    
                    <label class="edicao-div-edicao-label" for="contraste">Contraste:</label>
                    <input type="range" class="edicao-div-edicao-inputs" id="contraste" min="0" max="200" name="contraste">
                    <input type="number"  class="edicao-div-edicao-input-number" id="contraste_number" value="0">
                    <span class="edicao-div-edicao-span" id="valor_contraste"></span>

                    <label class="edicao-div-edicao-label" for="saturacao">Saturação:</label>
                    <input type="range" class="edicao-div-edicao-inputs" id="saturacao" min="0" max="200" name="saturacao">
                    <input type="number"  class="edicao-div-edicao-input-number" id="saturacao_number" value="0">
                    <span class="edicao-div-edicao-span" id="valor_saturacao"></span>
                </div>

                <div class="edicao-div-temp">
                    <label for="template">Template:</label>
                    <select name="template">
                        <option>Template 1</option>
                    </select>            
                </div>
                <button class="btn btn-primary" type="submit" style="margin-top:10px">Upload</button>                
            </div>
    </form>
    <br><a href="{{ route('image.index') }}"><button class="btn btn-primary" style="margin-top:10px">Voltar</button></a>
    
@endsection
@extends ('layout.layout')

@section('title')

    Edição de Imagem

@endsection

@section ('content')
       
    @if (count($errors) > 0)
        <div>
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div>
            {{ session('success') }}
        </div> 
    @endif

    <h3>Edição de Imagem</h3>
    <form method="post" action="{{ route('image.update', $image->id) }}">
        @method('PATCH')
        @csrf

        <?php
            $image_certa = $image->filename;
        ?>
            <div class="edicao">
                <?php
                    echo "<p class='edicao_p'>$image_certa</p>";
                ?> 
                <div class="edicao_div">
                    <img id="img" src="{{ asset('images/'. $image_certa .'') }}" name="img" class="edicao_div_img" title="{{$image_certa}}"/>
                </div>

                <div class="edicao_div_edicao">
                    <label class="edicao_div_edicao_label" for="brilho">Brilho:</label>
                    <input type="range" class="edicao_div_edicao_inputs" id="brilho" value="100" min="0" max="200" name="brilho">
                    <input type="number" class="edicao_div_edicao_input_number" id="brilho_number" value="0">
                    <span class="edicao_div_edicao_span" id="valor_brilho"></span>
                    
                    <label class="edicao_div_edicao_label" for="contraste">Contraste:</label>
                    <input type="range" class="edicao_div_edicao_inputs" id="contraste" min="0" max="200" name="contraste">
                    <input type="number"  class="edicao_div_edicao_input_number" id="contraste_number" value="0">
                    <span class="edicao_div_edicao_span" id="valor_contraste"></span>

                    <label class="edicao_div_edicao_label" for="saturacao">Saturação:</label>
                    <input type="range" class="edicao_div_edicao_inputs" id="saturacao" min="0" max="200" name="saturacao">
                    <input type="number"  class="edicao_div_edicao_input_number" id="saturacao_number" value="0">
                    <span class="edicao_div_edicao_span" id="valor_saturacao"></span>
                </div>

                <div class="edicao_div_temp">
                    <label for="template">Template:</label>
                    <select name="template">
                        <option>Template 1</option>
                    </select>            
                </div>
            </div>

        <button type="submit" style="margin-top:10px">Update</button>
    </form>
    
@endsection
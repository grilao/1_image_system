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
                echo "<p title='$image_certa' class='index-p'>$image_certa</p>";
            ?>
            <div class="center">
                <a href="{{ route('image.edit', $image->id)}}"><button style="padding-left: 15px; padding-right: 15px; float: left; margin-left: -137px;" class="btn btn-primary" type="submit">Editar</button></a>
                <form style="margin-left: -60px;" action="{{ route('image.destroy', $image->id)}}" method="post">
                @csrf
                @method('DELETE')
                    <button class="btn btn-danger" style="padding-left: 15px; padding-right: 15px;" type="submit">Excluir</button>
                </form>
            </div>
            <hr>
            <div class="index-div">
                <img id="img" src="{{ asset('images/'. $image_certa .'') }}" name="img" class="index-div-img" title="{{$image_certa}}"/>
            </div>
            <div class="index-div-temp">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="template">Templates</label>
                    </div>
                    <select class="custom-select" id="template">
                    @foreach ( $template as $temp )
                        <option value="1">{{$temp->nome}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>
    
    @endforeach

    <a href="download"><button style="position: relative; padding-left: 15px; padding-right: 15px; margin-left: 50px;" class="btn btn-primary" >Download</button></a>

    <br clear="all">

@endsection
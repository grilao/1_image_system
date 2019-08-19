@extends ('layout.layout')

@section('title')

    Página Inicial

@endsection

@section ('content')
       
    @if (count($errors) > 0)
        <div class="form-erro">
            <strong>Não foi possível realizar o upload!</strong><br><br>Erros:<br>
            <ul style="list-style: none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('sucesso'))
        <p>{{ session('sucesso') }}<p>
    @endif

    <br clear="all">
    <h3 style="margin-bottom: 50px;">Upload de Imagem</h3>
    <form method="post" action="{{ route('image.store') }}" enctype="multipart/form-data">
        {{csrf_field()}}

        <div>
            <label class="label-file" for="input-file">Selecionar um arquivo</label>
            <input class="input-file" id="input-file" type="file" multiple name="filename[]">
        </div>

        <button class="input-enviar" type="submit" style="margin-top:10px">Enviar</button>
    </form>
    
@endsection
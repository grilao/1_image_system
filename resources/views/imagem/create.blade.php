@extends ('layout.layout')

@section('title')

    Página Inicial

@endsection

@section ('content')
       
    @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <strong>Não foi possível realizar o upload!</strong><br><br>Erros:<br>
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

    <br clear="all">
    <h3 class="h3-main">Upload de Imagem</h3>
    <form method="post" action="{{ route('imagem.store') }}" enctype="multipart/form-data">
        {{csrf_field()}}

        <div>
            <input class="input-file" id="input-file" type="file" multiple name="filename[]" accept="image/*">
        </div>

        <button class="btn btn-primary" type="submit" style="margin-top:10px">Enviar</button>

        
    </form>
    
@endsection
@extends ('layout.layout')

@section('title')

    Página Inicial

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

    <h3>Upload de Imagem</h3>
    <form method="post" action="{{ route('image.store') }}" enctype="multipart/form-data">
        {{csrf_field()}}

        <div>
            <input type="file" multiple name="filename[]">
        </div>

        <button type="submit" style="margin-top:10px">Enviar</button>
    </form>
    
@endsection
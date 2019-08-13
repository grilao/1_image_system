@extends ('layout.layout')

@section('title')

    Cadastro de Templates

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

    <h3>Cadastro de Template</h3>
    <form method="post" action="{{ route('template.store') }}">
        {{csrf_field()}}

        <div>
            <label for="nome_template">Nome:</label><br/>
            <input type="text" id="nome_template" name="nome"><br/><br/>
        </div>
        <div>
            <label for="descricao_template">Descrição:</label><br/>
            <textarea id="descricao_template" name="descricao"></textarea><br/><br/>
        </div>
        <div>
            <label for="altura_template">Altura:</label><br/>
            <input type="text" id="altura_template" name="altura"><br/><br/>
        </div>
        <div>
            <label for="largura_template">Largura:</label><br/>
            <input type="text" id="largura_template" name="largura"><br/><br/>
        </div>

        <button type="submit" style="margin-top:10px">Cadastrar</button>
    </form>
    
@endsection
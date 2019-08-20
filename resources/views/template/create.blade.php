@extends ('layout.layout')

@section('title')

    Cadastro de Templates

@endsection

@section ('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <strong>Não foi possível realizar o cadastro!</strong><br><br>Erros:<br>
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

    <h3 class="h3-main">Cadastro de Template</h3>
    <form id="form" method="post" action="{{ route('template.store') }}">
        {{csrf_field()}}

        <div>
            <label for="nome_template">Nome:</label><br/>
            <input class="form-control" type="text" id="nome_template" name="nome" placeholder="Insira o nome do template"><br/><br/>
        </div>
        <div>
            <label for="descricao_template">Descrição:</label><br/>
            <input class="form-control" id="descricao_template" name="descricao" placeholder="Insira uma descrição"></input><br/><br/>
        </div>
        <div>
            <label for="altura_template">Altura:</label><br/>
            <input class="form-control" type="text" id="altura_template" name="altura" placeholder="Insira as alturas das imagens"><br/><br/>
            <span class="span-dica"><strong>Dica: </strong>Para colocar mais de uma altura, separa cada número por barras ( / ).</span>
        </div>
        <div>
            <label for="largura_template">Largura:</label><br/>
            <input class="form-control" type="text" id="largura_template" name="largura" placeholder="Insira as larguras das imagens"><br/><br/>
            <span class="span-dica"><strong>Dica: </strong>Para colocar mais de uma largura, separa cada número por barras ( / ).</span>
        </div>

        <button style="margin-left: 4%;" class="btn btn-primary" id="enviar" type="submit" style="margin-top:10px">Cadastrar</button>
    </form>
    
@endsection
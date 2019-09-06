@extends ('layout.layout')

@section('title')

    Cadastro de Templates

@endsection

@section ('content')

    <div class="container-main">
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

        <br clear="all">
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
                <input class="form-control" type="text" id="altura_template" name="altura" placeholder="Insira as alturas das imagens. Ex: 240/600/..."><br/><br/>
                <span class="span-dica"><strong>Dica: </strong>Para inserir mais de uma altura, separa cada número por barras ( / ).</span><br/>
                <span class="span-dica"><strong>Importante: </strong>Coloque o mesmo número de alturas e larguras.</span>
            </div>
            <div>
                <label for="largura_template">Largura:</label><br/>
                <input class="form-control" type="text" id="largura_template" name="largura" placeholder="Insira as larguras das imagens. Ex: 240/600/..."><br/><br/>
                <span class="span-dica"><strong>Dica: </strong>Para inserir mais de uma largura, separa cada número por barras ( / ).</span><br/>
                <span class="span-dica"><strong>Importante: </strong>Coloque o mesmo número de alturas e larguras.</span>
            </div>

            <button style="margin-left: 4%;" class="btn btn-primary" id="enviar" type="submit" style="margin-top:10px">Cadastrar</button>
        </form>
    </div>
    
@endsection
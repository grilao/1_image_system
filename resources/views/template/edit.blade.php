@extends ('layout.layout')

@section('title')

    Edição de Template

@endsection

@section ('content')

    <div class="container-main"> 
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

        <br clear="all">
        <h3 class="h3-main">Edição de Template</h3>
        <form method="post" action="{{ route('template.update', $template->id) }}">
            @method('PATCH')
            @csrf

            <div>
                <label for="nome_template">Nome:</label><br/>
                <input class="form-control" type="text" id="nome_template" name="nome" placeholder="Insira o nome do template" value={{ $template->nome }}><br/><br/>
            </div>
            <div>
                <label for="descricao_template">Descrição:</label><br/>
                <input class="form-control" id="descricao_template" name="descricao" placeholder="Insira uma descrição" value={{ $template->descricao }}><br/><br/>
            </div>
            <div>
                <label for="altura_template">Altura:</label><br/>
                <input class="form-control" type="text" id="altura_template" name="altura" placeholder="Insira as alturas das imagens" value={{ $template->altura }}><br/><br/>
                <span class="span-dica"><strong>Dica: </strong>Para colocar mais de uma altura, separa cada número por barras ( / ).</span>
            </div>
            <div>
                <label for="largura_template">Largura:</label><br/>
                <input class="form-control" type="text" id="largura_template" name="largura" placeholder="Insira as larguras das imagens" value={{ $template->largura }}><br/><br/>
                <span class="span-dica"><strong>Dica: </strong>Para colocar mais de uma largura, separa cada número por barras ( / ).</span>
            </div>

            <button style="margin-left: 4%;" class="btn btn-primary" type="submit" style="margin-top:10px">Salvar</button>
        </form>
        <br><a href="{{ route('template.index') }}"><button style="margin-left: 4%;" class="btn btn-primary" type="submit" style="margin-top:10px">Voltar</button></a>
    </div>

@endsection
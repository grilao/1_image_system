@extends ('layout.layout')

@section('title')

    Cadastro de Templates

@endsection

@section ('content')

    @if (count($errors) > 0)
        <div class="form-erro">
            <strong>Não foi possível realizar o cadastro!</strong><br><br>Erros:<br>
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

    <h3 style="margin-bottom: 50px;">Cadastro de Template</h3>
    <form id="form" method="post" action="{{ route('template.store') }}">
        {{csrf_field()}}

        <div>
            <label for="nome_template">Nome:</label><br/>
            <input class="input" type="text" id="nome_template" name="nome"><br/><br/>
            <span class="span-posicao" id="span-nome">Insira o nome do template</span>
        </div>
        <div>
            <label for="descricao_template">Descrição:</label><br/>
            <textarea class="input" id="descricao_template" name="descricao"></textarea><br/><br/>
            <span style="top: -60px;" class="span-posicao" id="span-descricao">Insira uma breve descrição do template</span>
        </div>
        <div>
            <label for="altura_template">Altura:</label><br/>
            <input class="input" type="text" id="altura_template" name="altura"><br/><br/>
            <span class="span-posicao" id="span-altura">Insira as alturas das imagens</span>
        </div>
        <div>
            <label for="largura_template">Largura:</label><br/>
            <input class="input" type="text" id="largura_template" name="largura"><br/><br/>
            <span class="span-posicao" id="span-largura">Insira as larguras das imagens</span>
        </div>

        <button class="input-enviar" id="enviar" type="submit" style="margin-top:10px">Cadastrar</button>
    </form>
    
@endsection
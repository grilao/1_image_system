@extends ('layout.layout')

@section('title')

    Edição de Template

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

    <h3 style="margin-bottom: 50px;">Edição de Template</h3>
    <form method="post" action="{{ route('template.update', $template->id) }}">
        @method('PATCH')
        @csrf

        <div>
            <label for="nome_template">Nome:</label><br/>
            <input class="input" type="text" id="nome_template" name="nome" value={{ $template->nome }}><br/><br/>
            <span class="span-posicao" id="span-nome">Insira o nome do template</span>
        </div>
        <div>
            <label for="descricao_template">Descrição:</label><br/>
            <textarea class="input" id="descricao_template" name="descricao" value={{ $template->descricao }}></textarea><br/><br/>
            <span style="top: -60px;" class="span-posicao" id="span-descricao">Insira uma breve descrição do template</span>
        </div>
        <div>
            <label for="altura_template">Altura:</label><br/>
            <input class="input" type="number" id="altura_template" name="altura" value={{ $template->altura }}><br/><br/>
            <span class="span-posicao" id="span-altura">Insira as alturas das imagens em pixels</span>
        </div>
        <div>
            <label for="largura_template">Largura:</label><br/>
            <input class="input" type="number" id="largura_template" name="largura" value={{ $template->largura }}><br/><br/>
            <span class="span-posicao" id="span-largura">Insira as larguras das imagens em pixels</span>
        </div>

        <button class="input-enviar" type="submit" style="margin-top:10px">Update</button>
    </form>
    
@endsection
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

    <h3>Edição de Template</h3>
    <form method="post" action="{{ route('template.update', $template->id) }}">
        @method('PATCH')
        @csrf

        <div>
            <label for="nome_template">Nome:</label><br/>
            <input type="text" id="nome_template" name="nome" value={{ $template->nome }}><br/><br/>
        </div>
        <div>
            <label for="descricao_template">Descrição:</label><br/>
            <textarea id="descricao_template" name="descricao" value={{ $template->descricao }}></textarea><br/><br/>
        </div>
        <div>
            <label for="altura_template">Altura:</label><br/>
            <input type="text" id="altura_template" name="altura" value={{ $template->altura }}><br/><br/>
        </div>
        <div>
            <label for="largura_template">Largura:</label><br/>
            <input type="text" id="largura_template" name="largura" value={{ $template->largura }}><br/><br/>
        </div>

        <button type="submit" style="margin-top:10px">Update</button>
    </form>
    
@endsection
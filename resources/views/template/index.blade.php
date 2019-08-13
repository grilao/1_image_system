@extends ('layout.layout')

@section('title')

    Edição

@endsection

@section ('content')

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br />
    @endif
    <h3>Lista de Templates</h3>

    <table border="1px black">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Alturas</th>
            <th>Larguras</th>
            <th colspan="2">Ação</th>
        </tr>

    @foreach ( $templates as $template )
            
        <tr>
            <td>{{$template->id}}</td>
            <td>{{$template->nome}}</td>
            <td>{{$template->descricao}}</td>
            <td>{{$template->altura}}</td>
            <td>{{$template->largura}}</td>
            <td><a href="{{ route('template.edit', $template->id)}}">Editar</a></td>
            <td>
                <form action="{{ route('template.destroy', $template->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
    
    @endforeach

    </table>

    <br clear="all">

@endsection
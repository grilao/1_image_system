@extends ('layout.layout')

@section('title')

    Edição

@endsection

@section ('content')

    <div class="container-main">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        
        <br clear="all">
        <h3 class="h3-main">Lista de Templates</h3>

        <table style="width: 100%;">
            <tr class="cab-table">
                <th style="border-radius: 15px 0px 0px 0px;" class="cab-th-table">Id</th>
                <th class="cab-th-table">Nome</th>
                <th class="cab-th-table">Descrição</th>
                <th class="cab-th-table">Alturas</th>
                <th class="cab-th-table">Larguras</th>
                <th style="width: 20%; border-radius: 0px 15px 0px 0px; line-height: 20px; text-align: center;" class="cab-th-table" colspan="2">Ação</th>
            </tr>

        @foreach ( $templates as $template )
                
            <tr class="line-table">
                <td class="line-td-table">{{$template->id}}</td>
                <td class="line-td-table">{{$template->nome}}</td>
                <td class="line-td-table">{{$template->descricao}}</td>
                <td class="line-td-table">{{$template->altura}}</td>
                <td class="line-td-table">{{$template->largura}}</td>
                <td style="border-bottom: solid 1px rgb(255, 255, 255);"><a style="padding-left: 15px; padding-right: 15px; position: relative; left: 30px;" href="{{ route('template.edit', $template->id)}}"><button  class="btn btn-primary" style="padding-left: 15px; padding-right: 15px;" type="submit">Editar</button></a></td>
                <td style="border-bottom: solid 1px rgb(255, 255, 255);">
                    <form style="padding-left: 15px; padding-right: 15px;" action="{{ route('template.destroy', $template->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" style="padding-left: 15px; padding-right: 15px; position: relative;" type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        
        @endforeach

        </table>

        <br clear="all">
    </div>
    
@endsection
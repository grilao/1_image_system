@extends('layout.layout')

@section('title')

    Recuperar senha

@endsection

@section('content')
    <div class="container-main">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <h3 class="h3-main">Recuperar Senha</h3>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="col-md-4" style="margin-top: 20px;">
                    <label for="email">{{ __('Enderenço de e-mail:') }}</label><br/>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>Nenhum usuário está cadastrado com esse e-mail.</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button style="float: left;" type="submit" class="btn btn-primary">{{ __('Enviar link para troca de senha') }}</button>
            </form>
            <a href="{{ route('login') }}"><button style="margin-left: 1%;" class="btn btn-primary">Voltar</button></a>
        </div>
    </div>
@endsection

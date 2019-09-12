@extends('layout.layout')

@section('title')

    Novo usuário

@endsection

@section('content')
    <div class="container-main">
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h3 class="h3-main">Cadastrar usuário</h3>
                <div class="col-md-4" style="margin-top: 20px;">
                    <label for="name">{{ __('Nome:') }}</label><br/>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Insira seu nome de usuário" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>Nome inválido</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4" style="margin-top: 20px;">
                    <label for="email">{{ __('Enderenço de e-mail:') }}</label><br/>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Insira seu endereço de e-mail" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>Email inválido</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4" style="margin-top: 20px;">
                    <label for="passsword">{{ __('Senha:') }}</label><br/>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Insira sua senha" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>Senha inválida</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4" style="margin-top: 20px; margin-bottom: 20px;">
                    <label for="passsword-confirm">{{ __('Confirmar senha:') }}</label><br/>
                    <input id="password-confirm" type="password" class="form-control" placeholder="Insira a mesma senha do campo anterior" name="password_confirmation" required autocomplete="new-password">
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Cadastrar') }}</button>
            </form>
        </div>
    </div>

@endsection

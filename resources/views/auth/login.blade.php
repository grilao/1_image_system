@extends('layout.layout')

@section('title')

    Login

@endsection

@section('content')
    <div class="container-main">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h3 class="h3-main">Login</h3>
            <form id="form" method="POST" action="{{ route('login') }}">
                {{csrf_field()}}

                <div class="col-md-4" style="margin-top: 20px;">
                    <label for="email">{{ __('Enderenço de e-mail:') }}</label><br/>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Insira seu endereço de e-mail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>E-mail não cadastrado.</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4" style="margin-top: 20px;">
                    <label for="descricao_template">{{ __('Senha:') }}</label><br/>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Insira sua senha" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>Senha incorreta</strong>
                        </span>
                    @enderror
                </div>
                <div style="margin-top: 20px; margin-bottom: 20px;" class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">{{ __('Lembrar de mim') }}</label>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Entrar') }}</button>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Esqueceu sua senha?') }}</a>
                @endif
            </form>
        </div>
    </div>
@endsection

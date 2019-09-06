@extends('layout.layout')

@section('content')
    <div class="container-main">
        <div class="card">
            <div class="card-header">{{ __('Verifique seu endereço de e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Um novo link de verificação foi enviado para o seu endereço de e-mail') }}
                        </div>
                    @endif

                    {{ __('Antes de prosseguir, verifique seu e-mail em busca de um link de verificação') }}
                    {{ __('Se você não recebeu o e-mail') }}, <a href="{{ route('verification.resend') }}">{{ __('Clique aqui para solicitar outro') }}</a>.
                </div>
            </div>
        </div>
    </div>
@endsection

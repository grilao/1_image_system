@extends('layout.layout')

@section('content')
<div class="container">
    <div class="col-md-8">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <a href="{{ route('imagem.create') }}">
            <button class="btn btn-primary">
                {{ __('Página inicial') }}
            </button>
        </a>
    </div>
</div>
@endsection

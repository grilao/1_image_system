@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Painel de controle</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <?php
                        header("location: /auth/register"); die('Não ignore meu cabeçalho...');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app') 

@section('content')
    <body class="fundoAuthLogin">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card"> 
                    <div class="card-header bg-custom">
                        {{ __('Gestor de Emoções Demander') }}&nbsp;&nbsp;&nbsp;💚
                    </div>

                    <div class="card-body fundoCard">
                        <form method="POST" action="{{ route('loginIndex') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label class="mb-3 labelQualSeuNome" for="nome">{{ __('Qual o Seu Nome?') }}</label>
                                <input id="nome" type="name" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary botaoAuthLogin">{{ __('Entrar') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

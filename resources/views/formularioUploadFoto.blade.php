@extends('layouts.app')

@section('content')
    <body class="fundoAuthLogin">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-custom">{{ __('Alterar Foto') }}</div>
                        <div class="card-body fundoCard">
                            <form action="{{ route('uploadFoto') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <div class="col-12">
                                        <input class="form-control botaoAuthLogin" style="margin-top: 25px; width:92%; color: rgb(39, 126, 54);" type="file" id="fotoPerfil" name="fotoPerfil" accept="image/*">
                                    </div>
                                    <button style="margin-top: 60px" type="submit" class="btn btn-primary botaoAuthLogin">Enviar Foto</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row mb-0" style="margin-left:10%">
            <div class="col-md-6 offset-md-4">
                <a href="{{ route('loginIndexMensagem') }}" class="btn btn-secondary mt-4 botaoAuthLogin">
                    Voltar para a Página Inicial
                </a>
            </div>
        </div>
    </body>
@endsection

@extends('layouts.app')

@section('content')
    <body class="cardOpcoes">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8 ">
                    <div class="card">
                        <div class="card-header text-center textoGerenciar cardOpcoes">Status da Área Escolhida</div>

                        <div class="card-body fundoCard">
                            <form method="POST" action="{{ route('verificarStatus') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="area" class="col-md-4 col-form-label text-md-right">Escolha a Área:</label>
                                    <div class="col-md-6">
                                        <!-- Dropdown para selecionar a área -->
                                        <select class="form-control" name="area" id="area" required>
                                            <option value="geral">Geral</option>
                                            <option value="familia">Família</option>
                                            <option value="trabalho">Trabalho</option>
                                            <!-- Adicione mais opções conforme necessário -->
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary mt-4 botaoAuthLogin">
                                            Verificar Status
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="mt-3 alert alert-{{$classe}}">
                                {{ $mensagem }}
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0" style="margin-right: 80%">
                <div class="col-md-6 offset-md-4">
                    <a href="{{ route('loginIndexMensagem') }}" class="btn btn-secondary mt-4 botaoAuthLogin">
                        <i class="fas fa-arrow-left"></i> 
                    </a>
                </div>
        </div>
       
    </body>
@endsection

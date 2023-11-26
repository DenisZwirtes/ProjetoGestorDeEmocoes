@extends('layouts.app')

@section('content')
    <body class="cardOpcoes">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center textoGerenciar cardOpcoes">Perfil</div>

                        <div class="card-body fundoCard">
                            <form method="POST" action="{{ route('salvarPerfil') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="nome" class="col-md-4 col-form-label text-md-right">Nome:</label>
                                    <div class="col-md-6">
                                        <input id="nome" type="text" class="form-control" name="nome" value="{{ $nome }}" required>
                                    </div>
                                </div>

                                <div class="form-group row mt-4">
                                    <label for="foto" class="col-md-4 col-form-label text-md-right">Foto:</label>
                                    <div class="col-md-6">
                                        <input id="foto" type="file" class="form-control botaoAuthLogin" style="color: rgb(39, 126, 54);" name="fotoPerfil">
                                    </div>
                                </div>

                                <div class="form-group row mb-0 mt-4">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary botaoAuthLogin">
                                            Salvar Alterações
                                        </button>
                                    </div>
                                </div>
                            </form>
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
    </body>

    <script>
        $(document).ready(function () {
            // Evento de alteração no campo de arquivo (input type=file)
            $('#foto').change(function () {
                var arquivo = $(this)[0].files[0];
                var nomeArquivo = arquivo.name;

                // Crie um objeto FormData para enviar o arquivo
                var formData = new FormData();

                // Adicione o arquivo ao objeto FormData
                formData.append('fotoPerfil', arquivo);

                // Adicione outros dados ao objeto FormData
                formData.append('nomeArquivo', nomeArquivo);
                formData.append('alterarPerfil', true);

                // Faça a requisição Ajax
                $.ajax({
                    type: 'POST',
                    url: '/upload-foto-perfil/',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // Manipule a resposta do servidor aqui (response)
                        console.log(response);
                    },
                    error: function (error) {
                        // Manipule erros aqui, se houver algum
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection

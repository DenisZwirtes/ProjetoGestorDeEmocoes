<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class FotoController extends BaseController
{
    public function mostrarFormulario()
    {
        return view('formularioUploadFoto');
    }

    public function uploadFoto(Request $request)
    {
        try {
            self::validarRequisicao($request);

            $nomeUsuario = Session::get('nome');
            $mensagem = $this->obterMensagem();
            $fotoPerfil = $request->file('fotoPerfil');
            $nomeArquivo = $this->obterNomeArquivo($request, $nomeUsuario, $fotoPerfil);

            // Verifica se o arquivo já existe no diretório
            if (!File::exists(public_path('img/' . $nomeArquivo))) {
                // Move o arquivo diretamente para o diretório desejado
                $fotoPerfil->move(public_path('img'), $nomeArquivo);
            }

            Session::put('nomeArquivoFoto', $nomeArquivo);

            $caminhoFoto = self::gerarCaminhoParaFoto($nomeArquivo);

            if ($request->input('alterarPerfil')) {
                return view('opcaoPerfil')->with(['caminhoFoto' => $caminhoFoto]);
            }

            return view('paginaInicial')->with(['nome' => $nomeUsuario, 'caminhoFoto' => $caminhoFoto, 'mensagem' => $mensagem]);
        } catch (\Throwable $excecao) {
            return view('erroUpload')->with(['erro' => $excecao->getMessage()]);
        }
    }

    public static function validarRequisicao($request)
    {
        $request->validate([
            'fotoPerfil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (!Session::get('nome')) {
            throw new Exception('Usuário sem nome definido!');
        }
    }

    public function obterNomeArquivo($request, $nomeUsuario, $fotoPerfil)
    {
        if (!$request->input('alterarPerfil')) {
            return $nomeUsuario . '_' . $fotoPerfil->getClientOriginalName() . '.' . $fotoPerfil->getClientOriginalExtension();
        }

        return $request->input('nomeArquivo');
    }

    public function obterMensagem()
    {
        if (!Session::get('mensagem')) {
            return LoginController::MENSAGEM_PADRAO;
        }

        return Session::get('mensagem');
    }

    public static function gerarCaminhoParaFoto($nomeArquivo)
    {
        return 'img/' . $nomeArquivo;
    }
}

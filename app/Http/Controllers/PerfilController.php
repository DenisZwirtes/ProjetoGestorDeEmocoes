<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;

class PerfilController extends BaseController
{
    public function index()
    {
        $nome = Session::get('nome');
        $nomeArquivo = Session::get('nomeArquivoFoto');
        $caminhoFoto = FotoController::gerarCaminhoParaFoto($nomeArquivo);

        if (!$caminhoFoto) {
            $caminhoFoto = LoginController::FOTO_PADRAO;
        }

        return view('opcoesUsuario.opcaoPerfil')->with(['nome' => $nome, 'caminhoFoto' => $caminhoFoto]);
    }

    public function salvarPerfil(Request $request)
    {
        try {
            FotoController::validarRequisicao($request);

            $nome = $request->input('nome');
            $nomeArquivoAtual = $request->input('nomeArquivoFoto');
            $mensagem = Session::get('mensagem');

            if (!$mensagem) {
                $mensagem = LoginController::MENSAGEM_PADRAO;
            }

            if (!$nomeArquivoAtual) {
                $nomeArquivo = Session::get('nomeArquivoFoto');

                if (!$nomeArquivo) {
                    $caminhoFoto = LoginController::FOTO_PADRAO;
                } else {
                    $caminhoFoto = FotoController::gerarCaminhoParaFoto($nomeArquivo);
                }
            } else {
                $caminhoFoto = FotoController::gerarCaminhoParaFoto($nomeArquivoAtual);
            }

            Session::put('nome', $nome);
            Session::put('nomeArquivoFoto', $nomeArquivo);

            return view('paginaInicial')->with(['nome' => $nome, 'caminhoFoto' => $caminhoFoto, 'mensagem' => $mensagem]);
        } catch (Exception $excecao) {
            return view('erroUpload')->with(['erro' => $excecao->getMessage()]);
        }
    }
}

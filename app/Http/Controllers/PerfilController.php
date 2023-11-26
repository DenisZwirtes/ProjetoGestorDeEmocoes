<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PerfilController extends BaseController
{
    public function index()
    {
        $nome = Session::get('nome');
        $nomeArquivo = Session::get('nomeArquivoFoto');
        $caminhoFoto = 'img/' . $nomeArquivo;

        if (!$caminhoFoto) {
            $caminhoFoto = LoginController::FOTO_PADRAO;
        }

        return view('opcoesUsuario.opcaoPerfil')->with(['nome' => $nome, 'caminhoFoto' => $caminhoFoto]);
    }

    public function salvarPerfil(Request $request)
    {
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
                $caminhoFoto = 'img/' . $nomeArquivo;
            }
        } else {
            $nomeArquivo = $nomeArquivoAtual;
            $caminhoFoto = 'img/' . $nomeArquivoAtual;
        }

        // Atualizar os dados na sessão
        Session::put('nome', $nome);
        Session::put('nomeArquivoFoto', $nomeArquivo);

        return view('paginaInicial')->with(['nome' => $nome, 'caminhoFoto' => $caminhoFoto, 'mensagem' => $mensagem]);
    }
}

<?php

namespace App\Http\Controllers;

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
        $alterarPerfil = $request->input('alterarPerfil');

        if(!$alterarPerfil){
            $alterarPerfil = false;
        }
        
        $request->validate([
            'fotoPerfil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Obtem o nome do usuário armazenado na sessão
        $nomeUsuario = Session::get('nome');
        $mensagem = Session::get('mensagem');

        if ($nomeUsuario) {
            $fotoPerfil = $request->file('fotoPerfil');
            
            if ($alterarPerfil) {
                $nomeArquivo = $request->input('nomeArquivo');

            } else {
                $nomeArquivo = $nomeUsuario . '_' . $fotoPerfil->getClientOriginalName(). '.' . $fotoPerfil->getClientOriginalExtension();
            }

             // Verifica se o arquivo já existe no diretório
             if (!File::exists(public_path('img/' . $nomeArquivo))) {
                // Move o arquivo diretamente para o diretório desejado
                $fotoPerfil->move(public_path('img'), $nomeArquivo);
            }

             // Armazena o nome do arquivo na sessão
             Session::put('nomeArquivoFoto', $nomeArquivo);

            $caminhoFoto = 'img/' . $nomeArquivo;

         if (!$mensagem){
            $mensagem = LoginController::MENSAGEM_PADRAO;
         }

         if($alterarPerfil){
            return view('opcaoPerfil')->with(['caminhoFoto' => $caminhoFoto]);
        }

            return view('paginaInicial')->with(['nome' => $nomeUsuario, 'caminhoFoto' => $caminhoFoto,'mensagem'=>$mensagem]);
        }

       

        return redirect()->back()->with('error', 'Falha ao carregar a foto. Nome do usuário não encontrado na sessão.');
    }

}

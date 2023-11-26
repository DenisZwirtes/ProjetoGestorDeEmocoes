<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class LoginController extends BaseController
{
    const MENSAGEM_PADRAO = 'Você ainda não gerenciou suas emoções hoje!';
    const FOTO_PADRAO = '/img/smileVerde.png';

    public function loginIndex(Request $request)
    {
        $nome = $request->input('nome');

        Session::put('nome', $nome);
       
        return view('paginaInicial')->with(['nome' => $nome, 'caminhoFoto' => self::FOTO_PADRAO, 'mensagem' => self::MENSAGEM_PADRAO]);
           
    }

    public function loginShow()

    {
        return view('login');
    }

    public function logout()

    {
        Auth::logout();

        // Limpa todos os dados de sessão
        Session::flush();

        return redirect('auth-login'); 
    }

    public function loginIndexMensagem(Request $request)

    {
        $nome = Session::get('nome');
        $nomeArquivo = Session::get('nomeArquivoFoto');
        $caminhoFoto = 'img/' . $nomeArquivo;
        $mensagem = $request->query('mensagem');
      
        if (!$mensagem){
            $mensagem =  Session::get('mensagem');
            
            if (!$mensagem){
                $mensagem = self::MENSAGEM_PADRAO;
            }
        }

        if (!$nomeArquivo){
            $caminhoFoto = self::FOTO_PADRAO;
        }

        
        return view('paginaInicial')->with(['nome' => $nome, 'caminhoFoto' => $caminhoFoto,'mensagem'=>$mensagem]);
    }
}

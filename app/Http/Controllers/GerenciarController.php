<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class GerenciarController extends BaseController
{
    public function index()
    {
        
        return view('opcoesUsuario.opcaoGerenciar'); 
    }

    public function geral(Request $request)
    {
        $avaliacao = $request->avaliacao;

        switch ($avaliacao) {
            case 1:
                $mensagem = "Nível crítico: Você precisa conversar com um profissional ou alguém de confiança!";
                break;
            case 2:
                $mensagem = "Nível baixo: Recomendamos procurar apoio para lidar com suas emoções.";
                break;
            case 3:
                $mensagem = "Nível moderado: Continue monitorando suas emoções e considere buscar apoio.";
                break;
            case 4:
                $mensagem = "Nível alto: Suas emoções estão em um bom estado, mas continue cuidando de si mesmo.";
                break;
            case 5:
                $mensagem = "Nível ótimo: Parabéns! Suas emoções estão em um estado excelente.";
                break;
            default:
                $mensagem = "Avaliação inválida.";
                break;
        }

        session()->put('mensagem', $mensagem);
        session()->put('status-geral', $avaliacao);

        return response()->json(['mensagem' => $mensagem, 'redirecionar' => '/login-mensagem']);
       
    }

    public function familia(Request $request)
    {
        $avaliacao = $request->avaliacao;
    
        switch ($avaliacao) {
            case 1:
                $mensagem = "Nível crítico na área da família: Você precisa conversar com um profissional ou alguém de confiança!";
                break;
            case 2:
                $mensagem = "Nível baixo na área da família: Recomendamos procurar apoio para lidar com suas emoções familiares.";
                break;
            case 3:
                $mensagem = "Nível moderado na área da família: Continue monitorando suas emoções familiares e considere buscar apoio.";
                break;
            case 4:
                $mensagem = "Nível alto na área da família: Suas emoções familiares estão em um bom estado, mas continue cuidando de si mesmo.";
                break;
            case 5:
                $mensagem = "Nível ótimo na área da família: Parabéns! Suas emoções familiares estão em um estado excelente.";
                break;
            default:
                $mensagem = "Avaliação inválida na área da família.";
                break;
        }
    
        // Salvando a mensagem e o status na sessão
        session()->put('mensagem', $mensagem);
        session()->put('status-familia', $avaliacao);
    
        return response()->json(['mensagem' => $mensagem, 'redirecionar' => '/login-mensagem']);
    }
    

    public function trabalho(Request $request)
    {
        $avaliacao = $request->avaliacao;

        switch ($avaliacao) {
            case 1:
                $mensagem = "Nível crítico: Você precisa conversar com um profissional ou alguém de confiança!";
                break;
            case 2:
                $mensagem = "Nível baixo: Recomendamos procurar apoio para lidar com suas emoções. Tente desacelerar um pouco. Dica: Faça uma Caminhada!";
                break;
            case 3:
                $mensagem = "Nível moderado: Continue monitorando suas emoções e considere buscar apoio. Não deixe seus hobbies de lado. Dica: Leia um bom livro!";
                break;
            case 4:
                $mensagem = "Nível alto: Suas emoções estão em um bom estado, mas continue cuidando de si mesmo.";
                break;
            case 5:
                $mensagem = "Nível ótimo: Parabéns! Suas emoções estão em um estado excelente.";
                break;
            default:
                $mensagem = "Avaliação inválida.";
                break;
        }

        session()->put('mensagem', $mensagem);
        session()->put('status-trabalho', $avaliacao);

        return response()->json(['mensagem' => $mensagem, 'redirecionar' => '/login-mensagem']);
       

    }
}

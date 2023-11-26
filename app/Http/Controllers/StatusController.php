<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StatusController extends BaseController
{
    public function index()
    {
        $classe = 'info';
        $mensagem = 'Veja Como Andam Suas Emoções escolhendo alguma área da sua Vida!';
        
        return view('opcoesUsuario.opcaoStatus')->with(['mensagem'=>$mensagem,'classe'=>$classe]);; 
    }

    public function verificarStatus(Request $request)
    {
        $area = $request->input('area');
        $textoAreaFormatado = ucfirst($area);
        $statusAvaliacao = Session::get('status-'.$area);

        switch ($statusAvaliacao) {
            case 1:
                $mensagem = "Nível crítico na área $area: Você precisa conversar com um profissional ou alguém de confiança!";
                $classe = "danger";
                break;

            case 2:
                $mensagem = "Nível baixo na área $area: Recomendamos procurar apoio para lidar com suas emoções.";
                $classe = "danger";
                break;

            case 3:
                $mensagem = "Nível moderado na área $area: Continue monitorando suas emoções e considere buscar apoio.";
                $classe = "warning";
                break;

            case 4:
                $mensagem = "Nível alto na área $area: Suas emoções estão em um bom estado, mas continue cuidando de si mesmo.";
                $classe = "info";
                break;

            case 5:
                $mensagem = "Nível ótimo na área $area: Parabéns! Suas emoções estão em um estado excelente.";
                $classe = "info";
                break;

            default:
                $mensagem = "Você ainda não gerenciou a área: $textoAreaFormatado";
                $classe = "info";
                break;
            }

        return view('opcoesUsuario.opcaoStatus')->with(['mensagem'=>$mensagem,'classe'=>$classe]);
    }
}

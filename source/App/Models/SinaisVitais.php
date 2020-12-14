<?php

namespace Source\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class SinaisVitais extends DataLayer
{
    public function __construct() {
        parent::__construct("sinaisvitais", [
            "idPaciente", 
            "pressao", 
            "batimentos", 
            "saturacaoOxigenio", 
            "nivelDioxidoCarbono",
            "temperatura"]);
    }

    public function register($idPaciente, $pressao, $batimentos, $saturacaoOxigenio, $nivelDioxidoCarbono, $temperatura): SinaisVitais
    {
        $this->idPaciente = $idPaciente;
        $this->pressao = $pressao;
        $this->batimentos =$batimentos;
        $this->saturacaoOxigenio = $saturacaoOxigenio;
        $this->nivelDioxidoCarbono = $nivelDioxidoCarbono;
        $this->temperatura = $temperatura;

        $this->save();

        return $this;
    }
}
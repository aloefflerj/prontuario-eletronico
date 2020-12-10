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
}
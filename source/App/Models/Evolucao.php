<?php

namespace Source\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Evolucao extends DataLayer
{
    public function __construct() {
        parent:: __construct("evolucao", ["idPaciente", "situacao", "observacoes"]);
    }

    public function register($idPaciente, $situacao, $observacoes): Evolucao {
        
        $this->idPaciente   = $idPaciente;
        $this->situacao     = $situacao;
        $this->observacoes  = $observacoes;

        $this->save();

        return $this;
    }
}
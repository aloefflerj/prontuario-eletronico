<?php

namespace Source\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Consultas extends DataLayer
{
    public function __construct() {
        parent::__construct("consultas", ["idPaciente", "idProfissional", "queixa" ,"dataConsulta", "finalizada"]);
    }

    public function register(
        string $idPaciente, 
        string $idProfissional, 
        string $queixa,
        string $dataConsulta, 
        string $finalizada
        ): Consultas
    {
        $this->idPaciente = $idPaciente;
        $this->idProfissional = $idProfissional;
        $this->queixa = $queixa;
        $this->dataConsulta = $dataConsulta;
        $this->finalizada = $finalizada;

        $this->save();

        return $this;
    }
}
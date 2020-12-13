<?php

namespace Source\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Medicamentos extends DataLayer
{
    public function __construct() 
    {
        parent:: __construct("medicamentos", [
            "idPaciente",
            "nome",
            "periodo",
            "horario",
            "via"
            ]);
    }

    public function register($idPaciente, $nome, $periodo, $horario, $via): Medicamentos
        {
            $this->idPaciente   = $idPaciente;
            $this->nome         = $nome;
            $this->periodo      = $periodo;
            $this->horario      = $horario;
            $this->via          = $via;

            $this->save();

            return $this;
        }
}
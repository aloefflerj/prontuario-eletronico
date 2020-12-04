<?php

namespace Source\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Pacientes extends DataLayer
{
    public function __construct()
    {
        parent::__construct("paciente", ["nome", "sobrenome"]);
    }

    public function add(String $nome, String $sobrenome): Pacientes
    {
        $this->nome         = $nome;
        $this->sobrenome    = $sobrenome;

        $this->save();

        return $this;
    }
}
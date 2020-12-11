<?php

namespace Source\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Pacientes extends DataLayer
{
    public function __construct()
    {
        parent:: __construct("pacientes", [
            "nome", 
            "cpf", 
            "telefone", 
            "endereco", 
            "anoNasc"
        ]);
    }

    public function register($nome, $cpf, $telefone, $endereco, $anoNasc): Pacientes
    {
        $this->nome             = $nome;
        $this->cpf              = $cpf;
        $this->telefone         = $telefone;
        $this->endereco         = $endereco;
        $this->anoNasc          = $anoNasc;

        $this->save();

        return $this;
    }
}

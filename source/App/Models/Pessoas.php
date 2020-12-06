<?php

namespace Source\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Pessoas extends DataLayer
{
    public function __construct($tabela, $colunas = [])
    {
        //parent::__construct("pessoas", ["nome", "cpf", "telefone", "endereco", "anoNasc"]);
        parent::__construct($tabela, ["nome", "cpf", "telefone", "endereco", "anoNasc", $colunas]);
    }
}
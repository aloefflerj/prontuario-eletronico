<?php

namespace Source\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Evolucao extends DataLayer
{
    public function __construct() {
        parent:: __construct("evolucao", ["idPaciente", "situacao", "observacoes"]);
    }
}
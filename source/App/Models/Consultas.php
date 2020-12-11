<?php

namespace Source\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Consultas extends DataLayer
{
    public function __construct() {
        parent::__construct("consultas", ["idPaciente", "idProfissional", "data", "finalizada"]);
    }
}
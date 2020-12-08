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
}
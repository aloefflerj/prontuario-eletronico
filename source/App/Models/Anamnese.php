<?php

namespace Source\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Anamnese extends DataLayer
{
    public function __construct() {
        parent::__construct("anamnese", [
            "idPaciente",
            "qp",
            "hda",
            "antecedentesPessoais",
            "antecedentesFamiliares",
            "habitos",
            "revisaoSistemas"
        ]);
    }
}
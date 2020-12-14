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

    public function register($idPaciente, $qp, $hda, $antecedentesPessoais, $antecedentesFamiliares, $habitos, $revisaoSistemas): Anamnese
    {
        $this->idPaciente = $idPaciente;
        $this->qp = $qp;
        $this->hda = $hda;
        $this->antecedentesPessoais = $antecedentesPessoais;
        $this->antecedentesFamiliares = $antecedentesFamiliares;
        $this->habitos = $habitos;
        $this->revisaoSistemas = $revisaoSistemas;
        
        $this->save();

        return $this;
    }
}
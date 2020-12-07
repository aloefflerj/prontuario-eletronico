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
            "anoNasc", 
            "idEvolucao", 
            "idAnamnese", 
            "idMedicamentos", 
            "idProfissional", 
            "idSinaisVitais"
        ]);
    }

    public function add(
        String $nome,
        $cpf,
        $telefone,
        $endereco,
        $anoNasc,
        $idEvolucao,
        $idAnamnese,
        $idMedicamentos,
        $idProfissional,
        $idSinaisVitais
    ): Pacientes {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone    = $telefone;
        $this->endereco    = $endereco;
        $this->anoNasc    = $anoNasc;
        $this->idEvolucao    = $idEvolucao;
        $this->idAnamnese    = $idAnamnese;
        $this->idMedicamentos    = $idMedicamentos;
        $this->idProfissional    = $idProfissional;
        $this->idSinaisVitais    = $idSinaisVitais;




        $this->save();

        return $this;
    }

    public function findBy(string $param, string $value = null)
    {
        $return = $this->find("{$param} = :ccode", "ccode={$value}")->fetch();
        if ($return)
        {
            return $return;
        }else{
            return $this;
        }
        
    }

    public function filterBy(string $param, string $value = null)
    {
        $return = $this->find("{$param} = :ccode", "ccode={$value}")->fetch(true);
        if ($return)
        {
            return $return;
        }else{
            return $this;
        }
        
    }
}

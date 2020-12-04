<?php

namespace Source\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Teste extends DataLayer
{
    public function __construct() {
        parent::__construct("paciente", ["nome", "sobrenome"]);
    }

    public function add(String $nome, String $sobrenome) : Teste{
        $this->nome         = $nome;
        $this->sobrenome    = $sobrenome;

        $this->save();

        return $this;

    }

    /*public function categories($category)
    {

        $result = $this->find("categoria = :cat", "cat={$category}")->fetch(true);

        return $result;

    }

    public function tipos($tipos)
    {

        $result = $this->find("tipo = :tipo", "tipo={$tipos}")->fetch(true);

        return $result;

    }

    public function getOneOccurrence($data)
    {
        echo $data;
    }*/
}
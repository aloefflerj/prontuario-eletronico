<?php

namespace Source\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Produtos extends DataLayer
{
    public function __construct() {
        parent::__construct("produtos", [], "idProduto", false);
    }

    public function add(String $nomeProduto, String $categoria, String $tipo, String $info, String $imagem) : Produtos{
        $this->nomeProduto  = $nomeProduto;
        $this->categoria    = $categoria;
        $this->tipo         = $tipo;
        $this->info         = $info;
        $this->imagem       = $imagem;

        $this->save();

        return $this;

    }

    public function categories($category)
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
    }
}
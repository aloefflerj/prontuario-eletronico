<?php

namespace Source\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Informativos extends DataLayer
{
    public function __construct() {
        parent::__construct("informativos", [], "idInformativo", false);
    }

    public function add(String $titulo, String $texto) : Informativos
    {
        $this->titulo           = $titulo;
        $this->texto             = $texto;

        $this->save();

        return $this;

    }
}
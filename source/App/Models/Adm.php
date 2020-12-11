<?php

namespace Source\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Adm extends DataLayer
{
    public function __construct() {
        parent:: __construct("adm", ["email", "senha"]);
    }
}
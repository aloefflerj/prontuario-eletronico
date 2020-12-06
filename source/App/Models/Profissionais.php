<?php

namespace Source\App\Models;

class Profissionais extends Pessoas
{
    public function __construct() 
    {
        parent:: __construct("profissionais", ["especializacao", "senha"]);
    }
}
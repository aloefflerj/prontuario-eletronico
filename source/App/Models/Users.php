<?php

namespace Source\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Users extends DataLayer
{
    public function __construct() {
        parent::__construct("template"/**Nome Tabela */, ["name"]/**Colunas obrigatórias */ 
    /**, Nome da autoincrement caso diferende de "id", false caso padrão diferente de created_at
     * e updated_at*/ );
    }

    public function add(String $name) : Users{
        
        $this->name = $name;
        $this->save();

        return $this;

    }
}
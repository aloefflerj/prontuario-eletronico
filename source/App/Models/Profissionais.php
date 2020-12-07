<?php

namespace Source\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Profissionais extends DataLayer
{
    public function __construct() 
    {
        parent:: __construct("profissionais", ["nome", "cpf", "telefone", "endereco", "anoNasc", "especializacao", "senha"]);
    }

    public function save(): bool
    {
        if(
            !$this->validatePassword() ||
            !parent::save()
        ){
            return false;
        }

        return true;
    }

    public function register($nome, $cpf, $telefone, $endereco, $anoNasc, $especializacao, $senha): Profissionais
    {
        $this->nome             = $nome;
        $this->cpf              = $cpf;
        $this->telefone         = $telefone;
        $this->endereco         = $endereco;
        $this->anoNasc          = $anoNasc;
        $this->especializacao   = $especializacao;
        $this->senha            = $senha;

        $this->save();

        return $this;
    }

    protected function validatePassword(): bool
    {
        if(empty($this->senha) || strlen($this->senha) < 5){
            flash("A senha deve ter pelo menos 5 caracteres");
            return false;
        }

        if(password_get_info($this->senha)["algo"]){
            return true;
        }

        $this->senha = password_hash($this->senha, PASSWORD_DEFAULT);
        return true;
    }
    
}
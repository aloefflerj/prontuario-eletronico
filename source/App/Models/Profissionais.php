<?php

namespace Source\App\Models;

class Profissionais extends Pessoas
{
    public function __construct() 
    {
        parent:: __construct("profissionais", ["especializacao", "senha"]);
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
        if(empty($this->password || strlen($this->passoword) < 5)){
            flash("A senha deve ter pelo menos 5 caracteres");
            return false;
        }

        if(password_get_info($this->password)["algo"]){
            return true;
        }

        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return true;
    }
    
}
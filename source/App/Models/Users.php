<?php

namespace Source\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Users extends DataLayer
{
    public function __construct() {
        parent:: __construct("users", ["email", "senha"]);
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

    public function register($email, $senha): Users
    {
        $this->email = $email;
        $this->senha = $senha;


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
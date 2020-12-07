<?php

namespace Source\App\Controllers;

use Core\Controller;
use Source\App\Models\Profissionais;

class Auth extends Controller
{
    public function __construct($router) 
    {
        parent::__construct($router);
        /**@var Profissionais */
        $this->profissionais = new Profissionais();
    }

    public function register($data): void
    {
        //Filtra os inputs de senha
        $senha          = filter_var($data["senha"], FILTER_DEFAULT);
        $confirmacao    = filter_var($data["confirmacao"], FILTER_DEFAULT);
        //Valida se a senha está vazia
        if(in_array("", $data)){
            echo $this->ajaxMessage("Insira um valor válido.", "error");
            return;
        }
        //Valida a confirmação da senha
        if($senha != $confirmacao){
            echo $this->ajaxMessage("A confirmação deve ser igual a senha", "error");
            return;
        }
        var_dump($data);
        $this->profissionais->register(
            $data["nome"],
            $data["cpf"],
            $data["telefone"],
            $data["endereco"],
            $data["anoNasc"],
            $data["especializacao"],
            $data["senha"]
        );
        
    }
}
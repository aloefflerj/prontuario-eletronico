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
        $this->profissionais->register(
            $data["nome"],
            $data["cpf"],
            $data["telefone"],
            $data["endereco"],
            $data["anoNasc"],
            $data["especializacao"],
            $data["senha"]
        );
        $this->router->redirect("web.home");
        
    }

    public function login($data): void
    {
        //Filtra os inputs
        $cpf    = filter_var($data["cpf"], FILTER_SANITIZE_STRIPPED);
        $senha  = filter_var($data["senha"], FILTER_DEFAULT); 

        //Verifica se os valores não são vazios
        if(in_array("", $data)){
            echo $this->ajaxMessage("Insira um valor válido", "error");
            return;
        }

        //Procura o profissional a partir do cpf inserido
        $profissional = $this->profissionais->findBy("cpf", $cpf);

        //Verifica a existência do usuário
        if(empty($profissional)){
            echo $this->ajaxMessage("Senha ou usuário inválidos", "error");
            return;
        }

        //Verifica a senha do usuário
        if(!password_verify($senha, $profissional->senha)){
            echo $this->ajaxMessage("Senha ou usuário inválidos", "error");
            return;
        }

        //Inicia a sessão do usuário (profissional)
        $_SESSION["profissional"] = $profissional->id;
        $this->router->redirect("app.home");
    }

    public function logout(): void
    {
        unset($_SESSION["profissional"]);
        $this->router->redirect("web.home");
    }

}
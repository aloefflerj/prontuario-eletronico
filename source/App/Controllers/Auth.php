<?php

namespace Source\App\Controllers;

use Core\Controller;
use Source\App\Models\Profissionais;
use Source\App\Models\Adm;
use Source\App\Models\Consultas;
use Source\App\Models\Pacientes;
use Source\App\Models\Users;

class Auth extends Controller
{
    public function __construct($router) 
    {
        parent::__construct($router);
        /**@var Profissionais */
        $this->profissionais = new Profissionais();
        /**@var Profissionais */
        $this->pacientes = new Pacientes();
        /**@var Users */
        $this->users = new Users();
        /**@var Adm*/
        $this->adm = new Adm();
        /**@var Consultas */
        $this->consultas = new Consultas();
    }

    /**
     * AUTENTICAÇÃO DE USUÁRIO -------------------------------------------------------------
     */

    public function userRegister($data): void
    {
        //Filtra o input de email
        $email = filter_var($data["email"], FILTER_SANITIZE_EMAIL);
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
        $this->users->register(
            $email,
            $senha
        );
        $this->router->redirect("web.home");
        
    }

    public function userLogin($data): void
    {
        //Filtra os inputs
        $email  = filter_var($data["email"], FILTER_SANITIZE_EMAIL);
        $senha  = filter_var($data["senha"], FILTER_DEFAULT); 

        //Verifica se os valores não são vazios
        if(in_array("", $data)){
            echo $this->ajaxMessage("Insira um valor válido", "error");
            return;
        }

        //Procura o profissional a partir do email inserido
        $user = $this->users->findBy("email", $email);

        //Verifica a existência do usuário
        if(empty($user)){
            echo $this->ajaxMessage("Senha ou usuário inválidos", "error");
            return;
        }

        //Verifica a senha do usuário
        if(!password_verify($senha, $user->senha)){
            echo $this->ajaxMessage("Senha ou usuário inválidos", "error");
            return;
        }

        //Inicia a sessão do usuário (profissional)
        $_SESSION["user"] = $user->id;

        $this->router->redirect("user.home");
    }

    public function userLogout(): void
    {
        unset($_SESSION["user"]);
        $this->router->redirect("web.home");
    }

    /**
     * AUTENTICAÇÃO DE PROFISSIONAIS -------------------------------------------------------------
     */

    public function profissionalRegister($data): void
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

    public function profissionalLogin($data): void
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

    public function profissionalLogout(): void
    {
        unset($_SESSION["profissional"]);
        $this->router->redirect("web.home");
    }

    /**
     * AUTENTICAÇÃO DE ADMINISTRADOR -------------------------------------------------------------
     */

    public function admLogin($data): void
    {
        //Filtra os inputs
        $email    = filter_var($data["email"], FILTER_SANITIZE_STRIPPED);
        $senha  = filter_var($data["senha"], FILTER_DEFAULT); 

        //Verifica se os valores não são vazios
        if(in_array("", $data)){
            echo $this->ajaxMessage("Insira um valor válido", "error");
            return;
        }

        //Procura o profissional a partir do email inserido
        $adm = $this->adm->findBy("email", $email);

        //Verifica a existência do usuário
        if(empty($adm)){
            echo $this->ajaxMessage("Senha ou email inválidos", "error");
            return;
        }

        //Verifica a senha do usuário
        if(!password_verify($senha, $adm->senha)){
            echo $this->ajaxMessage("Senha ou usuário inválidos", "error");
            return;
        }

        //Inicia a sessão do usuário (profissional)
        $_SESSION["adm"] = $adm->id;
        $this->router->redirect("adm.home");
    }

    public function admLogout(): void
    {
        unset($_SESSION["adm"]);
        $this->router->redirect("web.adm");
    }

    /**
     * AUTENTICAÇÃO DE PACIENTES -------------------------------------------------------------
     */

    public function pacienteRegister($data): void
    {
        //Valida se a senha está vazia
        if(in_array("", $data)){
            echo $this->ajaxMessage("Insira um valor válido.", "error");
            return;
        }
        $this->pacientes->register(
            $data["nome"],
            $data["cpf"],
            $data["telefone"],
            $data["endereco"],
            $data["anoNasc"]
        );

        if(!empty($_SESSION["adm"])){
            $this->router->redirect("adm.home");
        }else if(!empty($_SESSION["user"])){
            $this->router->redirect("user.home");
        }

        $this->router->redirect("web.home");  
        
    }

    /**
     * AUTENTICAÇÃO DE CONSULTAS -------------------------------------------------------------
     */
    public function novaConsulta($data): void
    {
        //Filtragem de segurança
        $idPaciente     = filter_var($data["idPaciente"], FILTER_VALIDATE_INT);
        $idProfissional = filter_var($data["idProfissional"], FILTER_VALIDATE_INT);
        $queixa         = filter_var($data["queixa"], FILTER_SANITIZE_STRIPPED);
        $dataConsulta   = filter_var($data["dataConsulta"], FILTER_SANITIZE_STRIPPED);
        $finalizada = "n";

        //Valida se a senha está vazia
        if(in_array("", $data)){
            echo $this->ajaxMessage("Insira um valor válido.", "error");
            return;
        }
        $this->consultas->register(
            $idPaciente,
            $idProfissional,
            $queixa,
            $dataConsulta,
            $finalizada
        );

        $this->router->redirect("user.home");
    }

    public function deletaConsulta($data): void
    {
        $consulta = $this->consultas->findById($data["id"]);
        $consulta->destroy();
        $this->router->redirect("user.consultas");
    }

}
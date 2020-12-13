<?php

namespace Source\App\Controllers;

use Core\Controller;
use Source\App\Models\Consultas;
use Source\App\Models\Pacientes;
use Source\App\Models\Profissionais;
use Source\App\Models\Users;

class User extends Controller
{
    public function __construct($router) {
        parent::__construct($router);

        /**@var Users */
        $this->users = new Users();
        /**@var Pacientes */
        $this->pacientes = new Pacientes();
        /**@var Profissionais */
        $this->profissionais = new Profissionais();
        /**@var Consultas */
        $this->consultas = new Consultas();

        if(empty($_SESSION["user"]) || !$this->users = (new Users)->findById($_SESSION["user"]))
        {
            unset($_SESSION["profissional"]);
            echo ("Acesso negado. Favor fazer login.");
            $this->router->redirect("web.home");
        }
    }

    
    public function home(): void
    {
        $consultas      = $this->consultas->find()->order("dataConsulta ASC")->fetch(true);
        $profissionais  = $this->profissionais->find()->fetch(true);
        $pacientes      = $this->pacientes->find()->fetch(true);
        
        $user = $this->users->findById($_SESSION["user"]);
        echo $this->view->render("user/home", [
            "user"      => $user,
            "consultas" => $consultas,
            "pacientes"     => $pacientes,
            "profissionais" => $profissionais
            ]);
    }

    public function consultas(): void
    {
        $consultas      = $this->consultas->find()->order("dataConsulta ASC")->fetch(true);
        $profissionais  = $this->profissionais->find()->fetch(true);
        $pacientes      = $this->pacientes->find()->fetch(true);
        
        echo $this->view->render("user/consultas", [
            "consultas"     => $consultas,
            "pacientes"     => $pacientes,
            "profissionais" => $profissionais
            ]);
    }

    public function novaConsulta(): void
    {
        //Busca os pacientes e profissionais no banco
        $pacientes      = $this->pacientes->find()->fetch(true);
        $profissionais  = $this->profissionais->find()->fetch(true);
        echo $this->view->render("user/novaConsulta", [
            "pacientes"     => $pacientes,
            "profissionais" => $profissionais
        ]);
    }

    public function pacientes(): void
    {
        echo $this->view->render("user/pacientes");
    }
    
    public function cadastro(): void
    {
        echo $this->view->render("user/cadastro");
    }

    //Procura paciente
    public function procuraPaciente($data): void
    {
        //Filtragem de segurança
        $nome = filter_var($data["nome"], FILTER_SANITIZE_STRIPPED);
        $cpf = filter_var($data["cpf"], FILTER_SANITIZE_STRIPPED);
        //Procura paciente por nome ou cpf
        $paciente = $this->pacientes->findBy("nome", $nome);
        if(!empty($cpf) && empty($nome)){
            $paciente = $this->pacientes->findBy("cpf", $cpf);
        }
        

        echo $this->view->render("user/fragments/resultado", ["paciente" => $paciente]);
    }

    //Procura consulta
    public function procuraConsulta($data): void
    {
        //Filtragem de segurança
        $idPaciente     = filter_var($data["idPaciente"], FILTER_VALIDATE_INT);
        $idProfissional = filter_var($data["idProfissional"], FILTER_VALIDATE_INT);
        $dataConsulta   = filter_var($data["dataConsulta"], FILTER_SANITIZE_STRIPPED);
        //Procura paciente por nome ou cpf
        if(!empty($idPaciente) && empty($idProfissional) && empty($dataConsulta)){
            $consultas = $this->consultas->filterBy("idPaciente", $idPaciente);
        }elseif(!empty($idProfissional)&& empty($idPaciente) && empty($dataConsulta)){
            $consultas = $this->consultas->filterBy("idProfissional", $idProfissional);
        }elseif(!empty($dataConsulta) && empty($idPaciente) && empty($idProfissional)){
            $consultas = $this->consultas->filterBy("dataConsulta", $dataConsulta);
        }else{
            $consultas = null;
        }
        
        // echo "<pre>", var_dump($consultas), "</pre>";
        // return;

        echo $this->view->render("user/fragments/resultadoConsultas", [
            "consultas" => $consultas
            ]);
    }
}
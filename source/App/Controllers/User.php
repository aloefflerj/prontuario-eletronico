<?php

namespace Source\App\Controllers;

use CoffeeCode\DataLayer\Connect;
use Core\Controller;
use DateTime;
use Source\App\Models\Consultas;
use Source\App\Models\Pacientes;
use Source\App\Models\Profissionais;
use Source\App\Models\Users;

class User extends Controller
{
    public function __construct($router) {
        parent::__construct($router);
        /**@var Connect */
        $this->connect = Connect::getInstance();
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
        //Procura paciente por paciente, profissional ou data
        if(!empty($idPaciente)){
            //Pesquisa de consulta através do paciente
            $consultas = $this->consultas->filterBy("idPaciente", $idPaciente);
        }elseif(!empty($idProfissional)){
            //Pesquisa de consulta através do profissional
            $consultas = $this->consultas->filterBy("idProfissional", $idProfissional);
        }elseif(!empty($dataConsulta)){
            //Formata a datetime para somente o dia atual
            $dataFormatada = (new DateTime($dataConsulta))->format("y-m-d");
            //Pesquisa o datetime no banco que começa com o dia de hoje
            $consultas = $this->consultas->find("dataConsulta LIKE '%{$dataFormatada}%'")->fetch(true);
        }else{
            $consultas = null;
        }
        //Pega dados de Paciente
        $pacientes = $this->pacientes->find()->fetch(true);
        //Pega dados de Profissional
        $profissionais = $this->profissionais->find()->fetch(true);

        echo $this->view->render("user/fragments/resultadoConsultas", [
            "pacientes"     => $pacientes,
            "profissionais" => $profissionais,
            "consultas"     => $consultas
            ]);
    }
}
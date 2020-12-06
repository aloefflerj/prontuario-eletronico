<?php

namespace Source\App\Controllers;

use Core\Controller;
use Source\App\Models\Pacientes;
use Source\App\Models\Pessoas;
use Source\App\Models\Profissionais;

class Web extends Controller
{
    //private $pacientes;

    public function __construct($router) {
        parent::__construct($router);
        /**@var Pacientes */
        $this->pacientes = new Pacientes();
        /**@var Profissionais */
        $this->profissionais = new Profissionais();
        /**@var Pessoas */
        $this->pessoas = new Pessoas("a",["a"]);
    }

    /**
     * Home
     */
    public function home(): void
    {
        $pacientes = $this->pacientes->find()->fetch(true);
        echo $this->view->render("web/home", ["pacientes"=>$pacientes]);
    }

    /**
     * Pacientes
     */
    public function index(): void
    {
        // Pega todos os Pacientes
        $pacientes = $this->pacientes->find()->fetch(true);
        echo $this->view->render("app/index", ["pacientes" => $pacientes]);
    }

    public function pacientes($data): void
    {
        // Pega todos os Pacientes
        $paciente = $this->pacientes->findById($data["id"]);
        //echo($paciente->nome);
        echo $this->view->render("app/pacientes", ["paciente" => $paciente]);
    }

    /**
     * Add
     */
    // public function add($data): void
    // {
    //     echo $data["nome"];
    //     // Adiciona no banco
    //     // $this->pacientes->add($data["nome"], $data["sobrenome"]);
    // }

    /**
     * Teste
     */
    public function teste(): void
    {
        //echo $this->view->render("web/teste");
        echo "<pre>" , var_dump($this->profissionais->find()->fetch(true)), "</pre>";
    }

    /**
     * Error
     */
    public function error($data): void
    {
        echo $this->view->render("error", ["errcode" => $data["errcode"]]);
    }
}
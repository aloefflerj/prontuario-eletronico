<?php

namespace Source\App\Controllers;

use Core\Controller;
use Source\App\Models\Pacientes;

class Web extends Controller
{
    //private $pacientes;

    public function __construct($router) {
        parent::__construct($router);
        /**@var Pacientes */
        $this->pacientes = new Pacientes();
    }

    /**
     * Home
     */
    public function home(): void
    {
        $pacientes = $this->pacientes->find()->fetch(true);
        //$pacientes = $this->pacientes = new Pacientes();
        echo $this->view->render("web/home", ["pacientes"=>$pacientes]);
    }

    /**
     * Add
     */
    public function add(): void
    {
        $this->pacientes->add("Anderson", "loeffler");
    }

    /**
     * Teste
     */
    public function teste(): void
    {
        echo $this->view->render("web/teste");
    }

    /**
     * Error
     */
    public function error($data): void
    {
        echo $this->view->render("error", ["errcode" => $data["errcode"]]);
    }
}
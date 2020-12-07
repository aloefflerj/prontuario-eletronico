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

        if(!empty($_SESSION["profissional"])){
            $this->router->redirect("app.home");
        }
    }



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
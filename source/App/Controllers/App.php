<?php

namespace Source\App\Controllers;

use Core\Controller;
use Source\App\Models\Pacientes;
use Source\App\Models\Profissionais;

class App extends Controller
{

    public function __construct($router) {
        parent::__construct($router);
        /**@var Pacientes */
        $this->pacientes = new Pacientes();
        /**@var Profissionais */
        $this->profissionais = new Profissionais();

        if(empty($_SESSION["profissional"]) || !$this->profissionais = (new Profissionais)->findById($_SESSION["profissional"]))
        {
            unset($_SESSION["profissional"]);
            echo ("Acesso negado. Favor fazer login.");
            $this->router->redirect("web.home");
        }
    }

    
    public function home(): void
    {
        //**FAZER a Validação de quais pacientes serão deste profissional

        //Consulta pacientes
        $pacientes = $this->pacientes->find()->fetch(true);
        $profissional = $this->profissionais->findById($_SESSION["profissional"]);
        echo $this->view->render("app/home", [
            "pacientes" => $pacientes,
            "profissional" => $profissional
            ]);
    }
}
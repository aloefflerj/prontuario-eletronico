<?php

namespace source\App\Controllers;

use Core\Controller;
use Source\App\Models\Adm as ModelAdm;

class Adm extends Controller
{
    public function __construct($router) 
    {
        parent:: __construct($router);

        if(empty($_SESSION["adm"]) || !$this->profissionais = (new ModelAdm)->findById($_SESSION["adm"]))
        {
            unset($_SESSION["adm"]);
            echo ("Acesso negado. Favor fazer login.");
            $this->router->redirect("web.adm");
        }
    }

    public function home(): void
    {
        echo $this->view->render("adm/home");
    }

    public function user(): void
    {
        echo $this->view->render("adm/user");
    }

    public function profissional(): void
    {
        echo $this->view->render("adm/profissional");
    }

    public function paciente(): void
    {
        echo $this->view->render("adm/paciente");
    }

}
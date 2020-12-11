<?php

namespace Source\App\Controllers;

use Core\Controller;
use Source\App\Models\Pacientes;
use Source\App\Models\Users;

class User extends Controller
{
    public function __construct($router) {
        parent::__construct($router);

        /**@var Users */
        $this->users = new Users();
        /**@var Pacientes */
        $this->pacientes = new Pacientes();

        if(empty($_SESSION["user"]) || !$this->users = (new Users)->findById($_SESSION["user"]))
        {
            unset($_SESSION["profissional"]);
            echo ("Acesso negado. Favor fazer login.");
            $this->router->redirect("web.home");
        }
    }

    
    public function home(): void
    {
        $user = $this->users->findById($_SESSION["user"]);
        echo $this->view->render("user/home", ["user" => $user]);
    }

    public function consultas(): void
    {
        $pacientes = $this->pacientes->find()->fetch(true);
        echo $this->view->render("user/consultas", ["pacientes" => $pacientes]);
    }

    public function novaConsulta(): void
    {
        echo $this->view->render("user/novaConsulta");
    }

    public function pacientes(): void
    {
        echo $this->view->render("user/pacientes");
    }
    
    public function cadastro(): void
    {
        echo $this->view->render("user/cadastro");
    }
}
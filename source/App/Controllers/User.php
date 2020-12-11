<?php

namespace Source\App\Controllers;

use Core\Controller;
use Source\App\Models\Users;

class User extends Controller
{
    public function __construct($router) {
        parent::__construct($router);
        $this->users = new Users();

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
}
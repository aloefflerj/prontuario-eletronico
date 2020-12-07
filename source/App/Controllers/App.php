<?php

namespace Source\App\Controllers;

use Core\Controller;
use Source\App\Models\Profissionais;

class App extends Controller
{
    /**@var Profisisonais */
    protected $profissionais;

    public function __construct($router) {
        parent::__construct($router);
        if(empty($_SESSION["profissional"]) || !$this->profissionais = (new Profissionais)->findById($_SESSION["profissional"]))
        {
            unset($_SESSION["profissional"]);
            echo ("Acesso negado. Favor fazer login.");
            $this->router->redirect("web.home");
        }
    }

    
    public function home(): void
    {
        var_dump($this->profissionais->findById($_SESSION["profissional"]));
    }
}
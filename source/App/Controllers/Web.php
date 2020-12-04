<?php

namespace Source\App\Controllers;

use Core\Controller;
use Source\App\Models\Users;

class Web extends Controller
{
    private $users;

    public function __construct($router) {
        parent::__construct($router);
        /**@var Users */
        $this->users = new Users();
    }

    /**
     * Home
     */
    public function home(): void
    {
        $users = $this->users->find()->fetch(true);
        
        echo $this->view->render("web/home", ["users" => $users]);
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
<?php

namespace source\App\Controllers;

use Core\Controller;

class Adm extends Controller
{
    public function __construct($router) 
    {
        parent:: __construct($router);
    }

    public function register($data): void
    {
        echo $this->view->render("adm/register");
    }
}
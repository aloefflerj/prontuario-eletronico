<?php

namespace Core;

use CoffeeCode\Router\Router;
use League\Plates\Engine;

class Controller
{

    /**@var Router */
    protected $router;

    /**@var Engine */
    protected $view;

    public function __construct($router, $dir = null, $globals = []) 
    {

        $dir = $dir ?? dirname(__DIR__, 1) . "/source/assets/views";

        $this->router = $router;
        $this->view = Engine::create($dir, "php");


        $this->view->addData(["router" => $this->router]);
        if($globals){
            $this->view->addData($globals);
        }

    }

    public function ajaxMessage(string $message, string $type): string
    {   
        return json_encode(flash($type, $message));
    }

}
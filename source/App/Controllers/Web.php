<?php

namespace Source\App\Controllers;

use Core\Controller;
use Source\App\Models\Pacientes;
use Source\App\Models\Profissionais;
use Source\App\Models\Adm;

class Web extends Controller
{
    //private $pacientes;

    public function __construct($router) {
        parent::__construct($router);
        /**@var Pacientes */
        $this->pacientes = new Pacientes();
        /**@var Profissionais */
        $this->profissionais = new Profissionais();
        $this->adm = new Adm();

        if(!empty($_SESSION["profissional"])){
            $this->router->redirect("app.home");
        }
    }

    public function home(): void
    {   
        if(!empty($_SESSION["profissional"])){
            $this->router->redirect("adm.home");
        }
        echo $this->view->render("web/home");
    }

    public function profissional(): void
    {
        echo $this->view->render("web/profissional");
    }

    public function user(): void
    {
        echo $this->view->render("web/user");
    }

    public function adm(): void
    {
        echo $this->view->render("web/adm");
    }

    //CADASTRA ADM
    public function add($data): void
    {
        $senha = filter_var($data["senha"], FILTER_DEFAULT);
        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $this->adm->email = $data["email"];
        $this->adm->senha = $senha;
        $this->adm->save();
    }

    /**
     * Teste
     */
    public function teste(): void
    {
        var_dump("oi");
    }

    /**
     * Error
     */
    public function error($data): void
    {
        echo $this->view->render("error", ["errcode" => $data["errcode"]]);
    }
}
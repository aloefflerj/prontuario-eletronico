<?php

namespace Source\App\Controllers;

use Core\Controller;
use Source\App\Models\Evolucao;
use Source\App\Models\Medicamentos;
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
        /**@var Medicamentos */
        $this->medicamentos = new Medicamentos();
        /**@var Evolucao */
        $this->evolucao = new Evolucao;

        if(empty($_SESSION["profissional"]) || !$this->profissionais = (new Profissionais)->findById($_SESSION["profissional"]))
        {
            unset($_SESSION["profissional"]);
            echo ("Acesso negado. Favor fazer login.");
            $this->router->redirect("web.home");
        }
    }

    
    public function home(): void
    {
        //Consulta o profissional
        $profissional = $this->profissionais->findById($_SESSION["profissional"]);
        //Consulta pacientes do profissional
        $pacientesDoProfissional =  $this->pacientes->filterBy("idProfissional", $_SESSION["profissional"]);
        //Renderiza a página
        echo $this->view->render("app/home", [
            "pacientes" => $pacientesDoProfissional,
            "profissional" => $profissional
            ]);
    }

    public function detalhes($data): void
    {
        //Procura e seleciona o paciente
        $paciente = $this->pacientes->findById($data["id"]);
        //Valida se pertence ao devido profissional
        if($paciente->idProfissional != $_SESSION["profissional"]){
            $this->router->redirect("app.home");
        }
        //Procura os medicamentos do paciente
        $medicamentos = $this->medicamentos->filterBy("idPaciente", $data["id"]);
        //Renderiza a página
        echo $this->view->render("app/detalhes_pacientes", [
            "paciente"      => $paciente,
            "medicamentos"  => $medicamentos
            ]);
    }

    public function evolucao($data): void
    {
        //Procura os medicamentos
        $evolucao = $this->evolucao->filterBy("idPaciente", $data["id"]);

    }
}
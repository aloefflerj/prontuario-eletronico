<?php

namespace Source\App\Controllers;

use Core\Controller;
use Source\App\Models\Anamnese;
use Source\App\Models\Evolucao;
use Source\App\Models\Medicamentos;
use Source\App\Models\Pacientes;
use Source\App\Models\Profissionais;
use Source\App\Models\SinaisVitais;

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
        /**@var SinaisVirais */
        $this->sinaisVitais = new SinaisVitais();
        /**@var Anamnese */
        $this->anamnese = new Anamnese();

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

    public function medicamentos($data): void
    {
        //Procura os medicamentos do paciente
        $medicamentos = $this->medicamentos->filterBy("idPaciente", $data["id"]);

        echo ($this->view->render("app/fragments/medicamentos", ["medicamentos" => $medicamentos]));

    }

    public function evolucao($data): void
    {
        //Procura a evolução do paciente e ordena do registro mais novo ao mais velho
        $evolucao = $this->evolucao->order("created_at DESC")->filterBy("idPaciente", $data["id"]);

        echo ($this->view->render("app/fragments/evolucao", ["evolucao" => $evolucao]));

    }

    public function sinaisVitais($data): void
    {
        //Procura os sinais vitais do paciente e ordena do registro mais novo ao mais velho
        $sinaisVitais = $this->sinaisVitais->order("created_at DESC")->filterBy("idPaciente", $data["id"]);

        echo ($this->view->render("app/fragments/sinaisVitais", ["sinaisVitais" => $sinaisVitais]));

    }

    public function anamnese($data): void
    {
        //Procura os sinais vitais do paciente e ordena do registro mais novo ao mais velho
        $anamnese = $this->anamnese->order("created_at DESC")->filterBy("idPaciente", $data["id"]);

        echo ($this->view->render("app/fragments/anamnese", ["anamnese" => $anamnese]));

    }

}
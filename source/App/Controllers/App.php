<?php

namespace Source\App\Controllers;

use Core\Controller;
use Source\App\Models\Anamnese;
use Source\App\Models\Consultas;
use Source\App\Models\Evolucao;
use Source\App\Models\Medicamentos;
use Source\App\Models\Pacientes;
use Source\App\Models\Profissionais;
use Source\App\Models\SinaisVitais;
use Source\App\Models\Users;

class App extends Controller
{

    public function __construct($router) {
        parent::__construct($router);
        /**@var Pacientes */
        $this->pacientes = new Pacientes();
        /**@var Profissionais */
        $this->profissionais = new Profissionais();
        /**@var Users */
        $this->users = new Users();
        /**@var Medicamentos */
        $this->medicamentos = new Medicamentos();
        /**@var Evolucao */
        $this->evolucao = new Evolucao;
        /**@var SinaisVirais */
        $this->sinaisVitais = new SinaisVitais();
        /**@var Anamnese */
        $this->anamnese = new Anamnese();
        /**@var Consultas */
        $this->consultas = new Consultas();

        if(empty($_SESSION["profissional"]) || !$this->profissionais = (new Profissionais)->findById($_SESSION["profissional"]))
        {
            unset($_SESSION["profissional"]);
            echo ("Acesso negado. Favor fazer login.");
            $this->router->redirect("web.home");
        }
    }

    
    public function home(): void
    {
        //Procura o profissional
        $profissional = $this->profissionais->findById($_SESSION["profissional"]);
        //Procura consultas do profissional
        $consultasDoProfissional =  $this->consultas->filterBy("idProfissional", $_SESSION["profissional"]);
        //Pega todos os pacientes
        $pacientes = $this->pacientes->find()->fetch(true);
        //Renderiza a página
        echo $this->view->render("app/home", [
            "consultas"     => $consultasDoProfissional,
            "profissional"  => $profissional,
            "pacientes"     => $pacientes
            ]);
    }

    public function detalhes($data): void
    {
        //Procura e seleciona o paciente
        $paciente = $this->pacientes->findById($data["idPaciente"]);
        //Valida se pertence ao devido profissional
        if($data["idProfissional"] != $_SESSION["profissional"]){
            $this->router->redirect("app.home");
        }
        //Procura os medicamentos do paciente
        $medicamentos = $this->medicamentos->filterBy("idPaciente", $data["idPaciente"]);
        //Renderiza a página
        echo $this->view->render("app/detalhes_pacientes", [
            "paciente"      => $paciente,
            "medicamentos"  => $medicamentos
            ]);
    }

    public function atendimento($data): void
    {
        //Procura e seleciona o paciente
        $paciente = $this->pacientes->findById($data["idPaciente"]);
        //Valida se pertence ao devido profissional
        if($data["idProfissional"] != $_SESSION["profissional"]){
            $this->router->redirect("app.home");
        }
        echo $this->view->render("app/atendimento", [
            "paciente" =>$paciente
        ]);
    }

    public function concluir($data): void
    {
        /*Filtragem de segurança-----------------------------*/
        $idPaciente = filter_var($data["idPaciente"], FILTER_SANITIZE_NUMBER_INT);
        //Medicamentos
        $nome       = filter_var($data["nome"], FILTER_SANITIZE_STRIPPED);
        $periodo    = filter_var($data["periodo"], FILTER_SANITIZE_STRIPPED);
        $horario    = filter_var($data["horario"], FILTER_SANITIZE_STRIPPED);
        $via        = filter_var($data["via"], FILTER_SANITIZE_STRIPPED);
        //Evolução
        $situacao   = filter_var($data["situacao"], FILTER_SANITIZE_STRIPPED);
        $observacoes= filter_var($data["observacoes"], FILTER_SANITIZE_STRIPPED);
        //Sinais Vitais
        $pressao            = filter_var($data["pressao"], FILTER_SANITIZE_STRIPPED);
        $batimentos         = filter_var($data["batimentos"], FILTER_SANITIZE_STRIPPED);
        $saturacaoOxigenio  = filter_var($data["saturacaoOxigenio"], FILTER_SANITIZE_STRIPPED);
        $nivelDioxidoCarbono= filter_var($data["nivelDioxidoCarbono"], FILTER_SANITIZE_STRIPPED);
        $temperatura        = filter_var($data["temperatura"], FILTER_SANITIZE_STRIPPED);
        //Anamnese
        $qp                     = filter_var($data["qp"], FILTER_SANITIZE_STRIPPED);
        $hda                    = filter_var($data["hda"], FILTER_SANITIZE_STRIPPED);
        $antecedentesPessoais   = filter_var($data["antecedentesPessoais"], FILTER_SANITIZE_STRIPPED);
        $antecedentesFamiliares = filter_var($data["antecedentesFamiliares"], FILTER_SANITIZE_STRIPPED);
        $habitos                = filter_var($data["habitos"], FILTER_SANITIZE_STRIPPED);
        $revisaoSistemas        = filter_var($data["revisaoSistemas"], FILTER_SANITIZE_STRIPPED);
        //*Valida se algum campo está vazio-----------------------------*/
        if(in_array("", $data)){
            echo $this->ajaxMessage("Verifique se nenhum dos campos está vazio", "error");
            return;
        }
        //Busca o modelo do paciente para poder atualizá-lo
        //$paciente = $this->pacientes->findById($idPaciente);
        
        //Salvando nos devidos bancos
        $this->medicamentos->register($idPaciente, $nome, $periodo, $horario, $via);
        $this->evolucao->register($idPaciente, $situacao, $observacoes);
        $this->sinaisVitais->register($idPaciente, $pressao, $batimentos, $saturacaoOxigenio, $nivelDioxidoCarbono, $temperatura);
        $this->anamnese->register($idPaciente, $qp, $hda, $antecedentesPessoais, $antecedentesFamiliares, $habitos, $revisaoSistemas);

        //Marcando consulta como atendida
        $consulta = $this->consultas->findBy("idPaciente", $idPaciente);
        $consulta->finalizada = "s";
        $consulta->save();

        $this->router->redirect("app.home");

    }

    //AJAX CALLS
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
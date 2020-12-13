<?php
ob_start();
session_start();


require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;


/**$var  Router*/
$router = new Router(site());
$router->namespace("Source\App\Controllers");

/* WEB --------------------------------------------- */

/**
 * WEB
 * home
 */
$router->group(null);
$router->get("/", "Web:home", "web.home");
$router->get("/user", "Web:user", "web.user");
$router->get("/profissional", "Web:profissional", "web.profissional");
$router->get("/adm", "Web:adm", "web.adm");
//$router->get("/add/{email}/{senha}", "Web:add", "web.add");

/**
 * WEB
 * Teste
 */

$router->group("teste");
$router->get("/", "Web:teste", "web.teste");

/* AUTH --------------------------------------------- */



/**
 * AUTH
 * user
 */
$router->group("auth-user");
$router->post("/register", "Auth:userRegister", "auth.userRegister");
$router->post("/login", "Auth:userLogin", "auth.userLogin");
$router->get("/logout", "Auth:userLogout", "auth.userLogout");

/**
 * AUTH
 * consultas
 */
$router->post("/novaConsulta", "Auth:novaConsulta", "auth.novaConsulta");
$router->post("/deletaConsulta", "Auth:deletaConsulta", "auth.deletaConsulta");


/**
 * AUTH
 * profissional
 */
$router->group("auth-profissional");
$router->post("/register", "Auth:profissionalRegister", "auth.profissionalRegister");
$router->post("/login", "Auth:profissionalLogin", "auth.profissionalLogin");
$router->get("/logout", "Auth:profissionalLogout", "auth.profissionalLogout");

/**
 * AUTH
 * paciente
 */
$router->group("auth-paciente");
$router->post("/register", "Auth:pacienteRegister", "auth.pacienteRegister");

/**
 * AUTH
 * adm
 */
$router->post("/adm/login", "Auth:admLogin", "auth.admLogin");
$router->get("/adm/logout", "Auth:admLogout", "auth.admLogout");

/* APP --------------------------------------------- */

/**
 * APP
 * Home
 */
$router->group("pacientes");
$router->get("/", "App:home", "app.home");
$router->get("/detalhes/{id}", "App:detalhes", "app.detalhes");
$router->get("/atendimento/{id}", "App:atendimento", "app.atendimento");
$router->post("/concluir", "App:concluir", "app.concluir");
//App ajax
$router->post("/medicamentos/{id}", "App:medicamentos", "app.medicamentos");
$router->post("/evolucao/{id}", "App:evolucao", "app.evolucao");
$router->post("/sinais-vitais/{id}", "App:sinaisVitais", "app.sinaisVitais");
$router->post("/anamnese/{id}", "App:anamnese", "app.anamnese");


/* USER --------------------------------------------- */

/**
 * USER
 * 
 */
//Home
$router->group("home");
$router->get("/", "User:home", "user.home");
//Consultas
$router->get("/consultas", "User:consultas", "user.consultas");
$router->get("/nova", "User:novaConsulta", "user.novaConsulta");
$router->post("/procura", "User:procuraConsulta", "user.procuraConsulta");
//Pacientes
$router->get("/paciente", "User:pacientes", "user.pacientes");
$router->get("/paciente/novo", "User:cadastro", "user.cadastro");
$router->post("/paciente/procura", "User:procuraPaciente", "user.procuraPaciente"); 


/* ADM --------------------------------------------- */

/**
 * ADM
 * Home
 */
$router->group("admin");
$router->get("/", "Adm:home", "adm.home");
$router->get("/cadastro/user", "Adm:user", "adm.user");
$router->get("/cadastro/profissional", "Adm:profissional", "adm.profissional");
$router->get("/cadastro/paciente", "Adm:paciente", "adm.paciente");

/**
 * WEB
 * error
 */
$router->group("ooops");
$router->get("/{errcode}", "Web:error", "web.error");

$router->dispatch();

if($router->error()){
    $router->redirect("web.error", ["errcode" => $router->error()]);
}

ob_end_flush();

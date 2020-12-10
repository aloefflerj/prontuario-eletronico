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
 * profissional
 */
$router->group("auth");
$router->post("/profissional/register", "Auth:profissionalRegister", "auth.profissionalRegister");
$router->post("/profissional/login", "Auth:profissionalLogin", "auth.profissionalLogin");
$router->get("/profissional/logout", "Auth:profissionalLogout", "auth.profissionalLogout");

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
$router->post("/medicamentos/{id}", "App:medicamentos", "app.medicamentos");
$router->post("/evolucao/{id}", "App:evolucao", "app.evolucao");
$router->post("/sinais-vitais/{id}", "App:sinaisVitais", "app.sinaisVitais");
$router->post("/anamnese/{id}", "App:anamnese", "app.anamnese");


/* USER --------------------------------------------- */

/**
 * USER
 * 
 */
$router->group("user");

$router->get("/pacientes", "Adm:paciente", "adm.paciente");

$router->get("/profissionais", "Adm:profissional", "adm.profissional");

$router->get("/consultas", "Adm:consultas", "adm.consultas");
$router->post("/consulta/novo", "Adm:novaConsulta", "adm.novaConsulta");


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

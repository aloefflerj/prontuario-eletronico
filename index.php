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

/**
 * WEB
 * Teste
 */

$router->group("teste");
$router->get("/", "Web:teste", "web.teste");

/* AUTH --------------------------------------------- */

/**
 * AUTH
 */
$router->group("auth");
$router->post("/register", "Auth:register", "auth.register");
$router->post("/login", "Auth:login", "auth.login");
$router->get("/logout", "Auth:logout", "auth.logout");

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


/* ADM --------------------------------------------- */

/**
 * ADM
 * Home
 */
$router->group("adm");
$router->get("/", "Adm:home", "adm.home");
$router->get("/consulta", "Adm:consulta", "adm.consulta");
$router->post("/consulta/novo", "Adm:novaConsulta", "adm.novaConsulta");

$router->get("/paciente", "Adm:paciente", "adm.paciente");
$router->post("/paciente/novo", "Adm:novoPaciente", "adm.novoPaciente");

$router->get("/profissional", "Adm:profissional", "adm.profissional");
$router->post("/profissional/novo", "Adm:novoProfissional", "adm.novoProfissional");

$router->post("/consulta/new", "Adm:novaConsulta", "adm.novaConsulta");
$router->get("/register", "Adm:register", "adm.register");

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

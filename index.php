<?php
session_start();

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;


/**$var  Router*/
$router = new Router(site());
$router->namespace("Source\App\Controllers");

/**
 * WEB
 * home
 */
$router->group(null);
$router->get("/", "Web:index", "web.index");

/**
 * WEB
 * Pacientes
 */
$router->group("pacientes");
$router->get("/{id}", "Web:pacientes", "web.pacientes");

/**
 * WEB
 * Teste
 */

$router->group("teste");
$router->get("/", "Web:teste", "web.teste");

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

<?php
ob_start();
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
$router->get("/", "Web:home", "web.home");

/**
 * WEB
 * Teste
 */

$router->group("teste");
$router->get("/", "Web:teste", "web.teste");

/**
 * Auth
 */
$router->group("auth");
$router->post("/register", "Auth:register", "auth.register");
$router->post("/login", "Auth:login", "auth.login");
$router->get("/logout", "Auth:logout", "auth.logout");

/**
 * App
 * Home
 */
$router->group("pacientes");
$router->get("/", "App:home", "app.home");
$router->get("/detalhes/{id}", "App:detalhes", "app.detalhes");

/**Adm
 * Register
 */
$router->group("adm");
$router->get("/", "Adm:home", "adm.home");
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

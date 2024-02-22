<?php

use Controller\AuthController;
use Controller\ClientesController;
use Controller\FilmeController;
use Controller\HomeController;
use System\EnumProtect;
use System\EnumTypeAuth;
// use Controller\ModeloController;
use System\Router;
  
$router = new Router;
$router->Authenticate(EnumTypeAuth::Bearer);
$router->Proteger(EnumProtect::Public);
 


// Home
$router->addRoute('GET', '/', function () { ( new HomeController)->Index(); });
$router->addRoute('GET', '/filme/:id', function ($id) { ( new FilmeController)->Index($id); });


// Login
$router->addRoute('POST', '/auth/login', function () { ( new AuthController)->Login(); }, EnumProtect::Public);


// Clientes
$router->addRoute('GET', '/clientes', function () { ( new ClientesController)->Listar(); }, EnumProtect::Public);
$router->addRoute('GET', '/clientes/:id', function ($id) { (new ClientesController)->Consultar($id); });
$router->addRoute('POST', '/clientes/cadastrar', function () { (new ClientesController)->Cadastrar(); });
$router->addRoute('PUT', '/clientes/editar/:id', function ($id) { (new ClientesController)->Editar($id); });
$router->addRoute('DELETE', '/clientes/:id', function ($id) { (new ClientesController)->Excluir($id); });

$router->matchRoute();

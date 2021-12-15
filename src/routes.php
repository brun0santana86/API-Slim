<?php

use Slim\Http\Request;
use Slim\Http\Reponse;

//rota options para habilitar o cors
$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

//Rota para produtos
require __DIR__ . '/routes/produtos.php';

//Rota para autenticao
require __DIR__ . '/routes/autenticacao.php';


//metodo map para fazer multiplos tratamentos de rotas
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
    $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
    return $handler($req, $res);
});



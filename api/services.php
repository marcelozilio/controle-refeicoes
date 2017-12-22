<?php
header('Access-Control-Allow-Origin: *');

/**
 *
 * @author: Marcelo Zilio Correa
 * @since: 04/12/2017
 */

require_once '../framework/Slim-2.6.3/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json');


/**
 * Base API
 */
$app->get('/', function () {
    echo "Refeições App REST API";
});

/**
 * Serviços de Instituicao
 */
$app->group('/instituicao', function () use ($app) {
    include_once 'resources/InstituicaoResource.php';
});

/**
 * Serviços de Pessoa
 */
$app->group('/pessoa', function () use ($app) {
    include_once 'resources/PessoaResource.php';
});

/**
 *  Serviços de Instituicao
 */
$app->group('/refeicao', function () use ($app) {
    include_once 'resources/RefeicaoResource.php';
});


$app->run();

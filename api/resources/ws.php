<?php

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
    include_once 'InstituicaoResource.php';
});

/**
 * Serviços de Pessoa
 */
$app->group('/pessoa', function () use ($app) {
    include_once 'PessoaResource.php';
});

/**
 *  Serviços de Instituicao
 */
$app->group('/refeicao', function () use ($app) {
    include_once 'RefeicaoResource.php';
});

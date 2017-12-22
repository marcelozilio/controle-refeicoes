<?php
header('Access-Control-Allow-Origin: *');

/**
 *
 * @author: Marcelo Zilio Correa
 * @since: 04/12/2017
 */

require_once '../framework/Slim-3.9.2/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json');

include_once 'resources/ws.php';

$app->run();

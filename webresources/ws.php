<?php
header('Access-Control-Allow-Origin: *');
require '../Slim/Slim.php';
require '../service/instituicaoservice.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json');

$app->get('/', function(){
	echo "Teste GET";
});

/*
Serviços da Instituição
*/
$app->group('/instituicao',function() use ($app){	

	$app->post('/save', function() use ($app) {

		$request = $app->request();
		$chamado = json_decode($request->getBody());

		$instituicaoService = new InstituicaoService();
		$instituicaoService->save($chamado);
	});

	$app->get('/findAll', function(){
		$instituicaoService = new InstituicaoService();
		$instituicoes = $instituicaoService->findAll();		
		echo json_encode($instituicoes);
	});

	$app->get('/delete/:id', function($id) {

	});
});

$app->run();
?>
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
		echo '[{"nome"="ABCDE","rua"="Teste, 123","email"="email@email.com","telefone"="5134880188"}]';
	});

	$app->get('/delete/:id', function($id) {

	});
});

$app->run();
?>
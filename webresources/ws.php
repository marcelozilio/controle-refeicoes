<?php
header('Access-Control-Allow-Origin: *');
require '../Slim/Slim.php';
require '../service/instituicaoservice.php';
require '../service/pessoaservice.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json');

$app->get('/', function(){
	echo "Teste GET";
});

/*
Serviços de Instituicao
*/
$app->group('/instituicao',function() use ($app){	

	$app->post('/save', function() use ($app) {

		$request = $app->request();
		$chamado = json_decode($request->getBody());

		$instituicaoService = new InstituicaoService();
		echo $instituicaoService->save($chamado);
	});

	$app->get('/findAll', function(){
		$instituicaoService = new InstituicaoService();
		$instituicoes = $instituicaoService->findAll();		
		echo json_encode($instituicoes);
	});

	$app->get('/delete/:id', function($id) {

	});
});

/*
Serviços de Pessoa
*/
$app->group('/pessoa',function() use ($app){	

	$app->post('/save', function() use ($app) {

		$request = $app->request();
		$pessoa = json_decode($request->getBody());

		$pessoaService = new PessoaService();
		echo $pessoaService->save($pessoa);
	});

	$app->get('/findAll', function(){
		$pessoaService = new PessoaService();
		$pessoas = $pessoaService->findAll();		
		echo json_encode($pessoas);
	});

	$app->get('/delete/:id', function($id) {

	});
});

$app->run();
?>
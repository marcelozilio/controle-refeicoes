<?php
header('Access-Control-Allow-Origin: *');
require '../Slim/Slim.php';
require '../service/InstituicaoService.php';
require '../service/PessoaService.php';
require '../service/RefeicaoService.php';

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
		$service = new InstituicaoService();
		echo $service->save($chamado);
	});

	$app->get('/findAll', function(){		
		$service = new InstituicaoService();
		$instituicoes = $service->findAll();		
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
		$service = new PessoaService();
		echo $service->save($pessoa);
	});

	$app->get('/findAll', function(){
		$service = new PessoaService();
		$pessoas = $service->findAll();		
		echo json_encode($pessoas);
	});

	$app->get('/delete/:id', function($id) {
	});
});

/*
Serviços de Instituicao
*/
$app->group('/refeicao',function() use ($app){	

	$app->post('/save', function() use ($app) {
		$request = $app->request();
		$refeicao = json_decode($request->getBody());
		$service = new RefeicaoService();
		echo $service->save($refeicao);
	});

	$app->get('/findAll', function(){		
		$service = new RefeicaoService();
		$refeicoes = $service->findAll();		
		echo json_encode($refeicoes);
	});

	$app->get('/delete/:id', function($id) {

	});
});

$app->run();
?>
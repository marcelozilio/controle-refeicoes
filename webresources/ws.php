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
		try {
			$request = $app->request();
			$chamado = json_decode($request->getBody());
			$service = new InstituicaoService();
			echo json_encode($service->save($chamado));
		} catch (Exception $e) {
			echo json_encode($e->getMessage());
		}

	});

	$app->get('/findAll', function(){
		try {
			$service = new InstituicaoService();
			$instituicoes = $service->findAll();
			echo json_encode($instituicoes);
		} catch (Exception $e) {
			echo json_encode($e->getMessage());
		}		

	});

	$app->get('/delete/:id', function($id) {
		try {
			$service = new InstituicaoService();
			echo json_encode($service->delete($id));
		} catch (Exception $e) {
			echo json_encode($e->getMessage());
		}
		
	});
});

/*
Serviços de Pessoa
*/
$app->group('/pessoa',function() use ($app){	

	$app->post('/save', function() use ($app) {
		try{
			$request = $app->request();
			$pessoa = json_decode($request->getBody());
			$service = new PessoaService();
			echo json_encode($service->save($pessoa));
		} catch (Exception $e) {
			echo json_encode($e->getMessage());
		}

	});

	$app->get('/findAll', function(){
		try {
			$service = new PessoaService();
			$pessoas = $service->findAll();
			echo json_encode($pessoas);
		} catch (Exception $e) {
			echo json_encode($e->getMessage());
		}

	});

	$app->get('/delete/:id', function($id) {
		try {
			$service = new PessoaService();
			echo json_encode($service->delete($id));
		} catch (Exception $e) {
			echo json_encode($e->getMessage());
		}
		
	});
});

/*
Serviços de Instituicao
*/
$app->group('/refeicao',function() use ($app){	

	$app->post('/save', function() use ($app) {
		try{
			$request = $app->request();
			$refeicao = json_decode($request->getBody());
			$service = new RefeicaoService();
			echo json_encode($service->save($refeicao));
		}catch(Exception $e){
			echo json_encode($e->getMessage());
		}

	});

	$app->get('/findAll', function(){		
		$service = new RefeicaoService();
		$refeicoes = $service->findAll();		
		echo json_encode($refeicoes);
	});

	$app->get('/delete/:id', function($id) {
		try {
			$service = new RefeicaoService();
			echo json_encode($service->delete($id));
		} catch (Exception $e) {
			echo json_encode($e->getMessage());
		}
		
	});
});

$app->run();
?>
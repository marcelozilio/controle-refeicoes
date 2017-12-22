<?php
require_once 'service/PessoaService.php';

$app->post('/save', function () use ($app) {
    try {
        $request = $app->request();
        $pessoa = json_decode($request->getBody());
        $service = new PessoaService();
        echo json_encode($service->save($pessoa));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/findAll', function () {
    try {
        $service = new PessoaService();
        $pessoas = $service->findAll();
        echo json_encode($pessoas);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/delete/:id', function ($id) {
    try {
        $service = new PessoaService();
        echo json_encode($service->delete($id));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

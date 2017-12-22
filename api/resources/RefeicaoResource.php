<?php

$app->post('/save', function () use ($app) {
    try {
        $request = $app->request();
        $refeicao = json_decode($request->getBody());
        $service = new RefeicaoService();
        echo json_encode($service->save($refeicao));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/findAll', function () {
    $service = new RefeicaoService();
    $refeicoes = $service->findAll();
    echo json_encode($refeicoes);
});

$app->get('/delete/:id', function ($id) {
    try {
        $service = new RefeicaoService();
        echo json_encode($service->delete($id));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

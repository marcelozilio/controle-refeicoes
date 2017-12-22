<?php

$app->post('/save', function () use ($app) {
    try {
        $request = $app->request();
        $chamado = json_decode($request->getBody());
        $service = new InstituicaoService();
        echo json_encode($service->save($chamado));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/findAll', function () {
    try {
        $service = new InstituicaoService();
        $instituicoes = $service->findAll();
        echo json_encode($instituicoes);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/delete/:id', function ($id) {
    try {
        $service = new InstituicaoService();
        echo json_encode($service->delete($id));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

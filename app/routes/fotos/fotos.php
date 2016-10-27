<?php

//Inicio
$app->get('/', function ($request, $response, $args) {

    return $this->view->render($response, 'inicio.html', [
        'name' => 'hola' //datos que pueden ser enviados a la vista
    ]);

})->setName('inicio');


//Acerca de
$app->get('/acerca', function ($request, $response, $args) {

    return $this->view->render($response, 'fotos/acerca.html', [
        'name' => 'hola'
    ]);

})->setName('acerca');


//Contacto
$app->get('/contacto', function ($request, $response, $args) {

    return $this->view->render($response, 'fotos/contacto.html', [
        'name' => 'hola'
    ]);

})->setName('contacto');


//Portafolio
$app->get('/portafolio', function ($request, $response, $args) {

    return $this->view->render($response, 'fotos/portafolio.html', [
        'name' => 'hola'
    ]);

})->setName('portafolio');

//Contacto
$app->post('/contacto', function ($reques, $response, $args) {


}
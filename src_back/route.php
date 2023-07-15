<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Тимчасова сторінка, в майбутньому потрібно видалити");
    return $response;
});



$app->get('/api_font/{key_api}', 'APIFontController:index');

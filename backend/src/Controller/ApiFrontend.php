<?php

namespace App\Controller;


use App\Model\ApiFontModel;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

final class ApiFrontend
{
    protected $container;
    protected $AuthModel;

    public function __construct($container)
    {
        $this->container = $container;
        $this->AuthModel = new ApiFontModel($container);
    }

    public function index(Request $request, Response $response, $args)
    {

        $data = $this->AuthModel->checkAPI_KEY($args['key_api']);

        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json');
    }
}

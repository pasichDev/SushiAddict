<?php

namespace SushiApp\Controllers;

use SushiApp\Model\APIFontModel;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

final class APIFontController
{
    protected $container;
    protected $AuthModel;

    public function __construct($container)
    {
        $this->container = $container;
        $this->AuthModel = new APIFontModel($container);
    }

    public function index(Request $request, Response $response, $args)
    {
        $keyApi = $args['key_api'];

        $data = [
            'key_api' => $keyApi,
            'message' => 'Success',
        ];

        return $response->withHeader('Content-Type', 'application/json')->write(json_encode($this->AuthModel->checkAPI_KEY($keyApi)));
    }
}

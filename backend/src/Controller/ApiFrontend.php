<?php

namespace App\Controller;

use App\Methods\Core;
use App\Model\RequestError;
use App\Model\RequestSuccess;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

final class ApiFrontend
{
    protected $container;
    private $DB;
    private $settings;


    public function __construct($container)
    {
        $this->container = $container;
        $this->settings =  $container->get('settings')['API_KEYS'];
        $this->DB = $container->get('db');
    }

    public function index(Request $request, Response $response, $args)
    {
        $response->getBody()->write($this->router($args['parram_q']));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function router($parram)
    {
        $RequestErrorApi = new RequestError(201, "Invalid API key");
        $linkDecode = Core::decoderLink($parram);


        if ($this->settings['API_KEY_FONT'] == $linkDecode->getApiKey()) {
            $requestSucces = new RequestSuccess('Teste');
            return $requestSucces->toJson();
        }
        return $RequestErrorApi->toJson();
    }
}

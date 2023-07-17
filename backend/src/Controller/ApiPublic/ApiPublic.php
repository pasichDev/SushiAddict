<?php

namespace App\Controller\ApiPublic;

use App\Methods\Core;
use App\Model\RequestProduct;
use App\Methods\Errors;
use App\Methods\Actions;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class ApiPublic
{
    protected $container;
    protected $DB;
    protected $settings;
    protected $errors;
    protected $actions;
    protected $linkParram;

    public function __construct($container)
    {
        $this->container = $container;
        $this->settings =  $container->get('settings')['API_KEYS'];
        $this->DB = $container->get('db');
        $this->errors = new Errors();
        $this->actions = new Actions();
    }

    public  function index(Request $request, Response $response, $args)
    {
        $this->linkParram = Core::decoderLink($args['parram_q']);
        $response->getBody()->write(json_encode($this->router(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
        return $response->withHeader('Content-Type', 'application/json')->withHeader('Access-Control-Allow-Origin', '*');
    }


    protected final function router()
    {


        if ($this->settings['API_KEY_PUBLIC'] == $this->linkParram->getApiKey()) {
            return $this->nextRouter();
        } else {
            return $this->errors->api_key_invalid->toArray();
        }
    }


    protected  function nextRouter()
    {
    }
}

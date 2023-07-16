<?php

namespace App\Controller;

use App\Methods\Core;
use App\Model\RequestProduct;
use App\Methods\Errors;
use App\Methods\Actions;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

final class ApiFrontend
{
    protected $container;
    private $DB;
    private $settings;
    private $errors;
    private $actions;


    public function __construct($container)
    {
        $this->container = $container;
        $this->settings =  $container->get('settings')['API_KEYS'];
        $this->DB = $container->get('db');
        $this->errors = new Errors();
        $this->actions = new Actions();
    }

    public function index(Request $request, Response $response, $args)
    {
        $response->getBody()->write(json_encode($this->router($args['parram_q']), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
        return $response->withHeader('Content-Type', 'application/json');
    }

    private function router($parram)
    {
        $linkDecode = Core::decoderLink($parram);


        if ($this->settings['API_KEY_FONT'] == $linkDecode->getApiKey()) {

            if ($this->isValidCategory($linkDecode->getQ())) {
                return $this->errors->category_invalid->toArray();
            }
            switch ($linkDecode->getAction()) {
                case $this->actions->loadProduct:
                    return $this->loadProduct($linkDecode->getQ());
                    break;

                default:
                    return $this->errors->action_invalid->toArray();
                    break;
            }
        } else {

            return $this->errors->api_key_invalid->toArray();
        }
    }




    private function loadProduct($category)
    {

        $connect = $this->DB->prepare('SELECT * FROM product WHERE category = :id');
        $connect->bindValue(':id', $category);
        $connect->execute();
        $results = $connect->fetchAll(\PDO::FETCH_ASSOC);
        $requestSucces = new RequestProduct($results);
        return $requestSucces->toArrays();
    }

    private function isValidCategory($category)
    {

        $connect = $this->DB->prepare('SELECT COUNT(*) FROM category WHERE id = :id');
        $connect->bindValue(':id', $category);
        $connect->execute();
        return  $connect->fetchColumn() == 0;
    }
}

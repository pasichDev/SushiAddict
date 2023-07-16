<?php

namespace App\Model;

use App\Methods\Core;

class ApiFontModel
{
    private $DB;
    protected $container;
    private $settings;


    public function __construct($container)
    {
        $this->container = $container;
        $this->settings =  $container->get('settings')['API_KEYS'];
        $this->DB = $container->get('db');
    }

    public function router($parram)
    {

        $ParramLink = Core::decoderLink($parram);


        if ($this->settings['API_KEY_FONT'] == $ParramLink) {
            return $this->KEY_API_SUCCES();
        } else
            return $ParramLink;
    }


    public function KEY_API_FAIL()
    {

        return   [
            'error' => [
                'code' => 'Invalid API key',
                'message' => 'Invalid API key'
            ],
        ];
    }

    public function KEY_API_SUCCES()
    {

        return   [
            'testAPi' => 'Okay'
        ];
    }
}

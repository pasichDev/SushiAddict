<?php

namespace App\Model;

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

    public function checkAPI_KEY($API_KEY)
    {
        if ($this->settings['PUBLIC_FRONT_ACCES_TOKEN_API'] == $API_KEY) {
            return $this->KEY_API_SUCCES();
        }
        return $this->KEY_API_FAIL();
    }


    /*
Це метод перенести в окреми клас 
*/
    public function KEY_API_FAIL()
    {

        return   [
            'error' => [
                'code' => API_NOT_VALID_CODE,
                'message' => API_NOT_VALID
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

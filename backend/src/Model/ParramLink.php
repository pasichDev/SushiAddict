<?php

namespace App\Model;

class ParramLink
{
    private $api_key;
    private $action;
    public function __construct($api_key,$action)
    {
        $this->api_key = $api_key;
        $this->action = $action;
    }

    public function getApiKey()
    {
        return $this->api_key;
    }

    public function getAction()
    {
        return $this->action;
    }

}

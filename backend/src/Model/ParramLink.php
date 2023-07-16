<?php

namespace App\Model;

class ParramLink
{
    private $api_key;
    private $action;
    private $q;
    public function __construct($api_key, $action, $q)
    {
        $this->api_key = $api_key;
        $this->action = $action;
        $this->q = $q;
    }

    public function getApiKey()
    {
        return $this->api_key;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getQ()
    {
        return $this->q;
    }
}

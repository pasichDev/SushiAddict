<?php

namespace App\Methods;

use App\Model\RequestError;

class Errors
{

    public $api_key_invalid;
    public $action_invalid;
    public $category_invalid;

    public function __construct()
    {
        $this->api_key_invalid = new RequestError(201, "Invalid API key");
        $this->action_invalid = new RequestError(202, "Invalid Action");
        $this->category_invalid = new RequestError(203, "Invalid Category");
    }
}

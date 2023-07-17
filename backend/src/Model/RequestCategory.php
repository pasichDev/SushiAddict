<?php

namespace App\Model;

use App\Model\RequestSuccess;

class RequestCategory extends RequestSuccess
{

    private $requestProduct;


    public function __construct($requestProduct)
    {
        $this->requestProduct = $requestProduct;
    }

    public function toArrays()
    {
        $actions = [
            'Category' => $this->requestProduct

        ];
        return array_merge($this->toArray(), $actions);
    }
}

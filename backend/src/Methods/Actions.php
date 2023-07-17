<?php

namespace App\Methods;


class Actions
{

    public $allCategoryLoad;
    public $loadProductFromCategory;

    public function __construct()
    {
        $this->allCategoryLoad = "getAll";
        $this->loadProductFromCategory = "getProductFromCategory";
    }
}

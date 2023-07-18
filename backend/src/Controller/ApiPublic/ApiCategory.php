<?php

namespace App\Controller\ApiPublic;


use App\Controller\ApiPublic\ApiPublic;

use App\Model\RequestCategory;

final class ApiCategory extends ApiPublic
{
    protected  function nextRouter()
    {

        switch ($this->linkParram->getAction()) {
            case $this->actions->allCategoryLoad:
                return $this->loadCategory();
                break;

            default:
                return $this->errors->action_invalid->toArray();
                break;
        }
    }



    private function loadCategory()
    {

        $connect = $this->DB->prepare('SELECT * FROM category');
        $connect->execute();
        $requestSucces = new RequestCategory($connect->fetchAll(\PDO::FETCH_ASSOC));
        return $requestSucces->toArrays();
    }
}

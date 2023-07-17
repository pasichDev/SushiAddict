<?php

namespace App\Controller\ApiPublic;


use App\Controller\ApiPublic\ApiPublic;

use App\Model\RequestProduct;

final class ApiProducts extends ApiPublic
{
    protected  function nextRouter()
    {

        if ($this->isValidCategory($this->linkParram->getQ())) {
            return $this->errors->category_invalid->toArray();
        }
        switch ($this->linkParram->getAction()) {
            case $this->actions->loadProductFromCategory:
                return $this->loadProduct($this->linkParram->getQ());
                break;

            default:
                return $this->errors->action_invalid->toArray();
                break;
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

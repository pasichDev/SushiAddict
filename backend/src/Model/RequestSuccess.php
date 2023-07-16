<?php

namespace App\Model;


class RequestSuccess
{
    private $code = 100;
    private $message = "Success";

    public function __construct()
    {
    }

    public function toArray()
    {
        return [
            'status' =>  [
                'code' => $this->code,
                'message' => $this->message
            ]
        ];
    }
}

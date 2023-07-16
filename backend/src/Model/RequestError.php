<?php

namespace App\Model;


class RequestError
{
    private $code;
    private $message;
    public function __construct($code, $message)
    {
        $this->code = $code;
        $this->message = $message;
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

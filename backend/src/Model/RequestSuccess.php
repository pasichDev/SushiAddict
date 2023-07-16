<?php

namespace App\Model;


class RequestSuccess
{
    private $code = 100;
    private $message = "Success";
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function toJson()
    {
        return json_encode([
            'status' =>  [
                'code' => $this->code,
                'message' => $this->message
            ],
            'Request' => ['test' => $this->request]
        ]);
    }
}

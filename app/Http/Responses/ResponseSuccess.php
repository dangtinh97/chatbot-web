<?php

namespace App\Http\Responses;

class ResponseSuccess extends ApiResponse
{
    public function __construct($response = [], $status = 200, $message = 'Thành công!')
    {
        $this->code = $status;
        $this->message = $message;
        $this->response = $response;
    }
}

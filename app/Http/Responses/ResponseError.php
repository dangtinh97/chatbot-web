<?php

namespace App\Http\Responses;

class ResponseError extends ApiResponse
{
    public function __construct($message = 'Hệ thống gián đoạn, vui lòng thử lại sau!', $status = 500, $response = [])
    {
        $this->code = $status;
        $this->message = $message;
        $this->response = $response;
    }
}

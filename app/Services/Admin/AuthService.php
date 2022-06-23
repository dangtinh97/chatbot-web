<?php

namespace App\Services\Admin;

use App\Http\Responses\ApiResponse;
use App\Http\Responses\ResponseError;
use App\Http\Responses\ResponseSuccess;
use App\Repositories\AdminRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthService
{
    protected $adminRepository;
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function attempt(array $params):ApiResponse
    {
        $login = Auth::guard('api')->attempt($params);
        if(!$login) return new ResponseError("Tài khoản hoặc mật khẩu không chính xác");

        /** @var \App\Models\Admin $user */
        $user = $this->adminRepository->findFirst([
            'username'  => Arr::get($params,'username')
        ]);
        $loginWeb = Auth::guard('web')->attempt($params);

        return new ResponseSuccess([
            'token' => $login
        ],200,"Login Success");
    }
}

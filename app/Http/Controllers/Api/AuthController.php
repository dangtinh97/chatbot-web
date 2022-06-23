<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Models\Admin;
use App\Services\Admin\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function attempt(AdminLoginRequest $request)
    {
//        Admin::query()->create([
//            'username' => 'dangtinh',
//            'password' => Hash::make('123456'),
//            'full_name' => 'Vũ Đăng Tính',
//            'email' => 'dangtinha2@gmail.com',
//            'mobile' => '0372052643',
//        ]);

        $login = $this->authService->attempt([
            'username' => 'dangtinh',
            'password' => '123456',
        ]);
        return response()->json($login->toArray());
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Responses\ResponseError;
use App\Services\Admin\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login()
    {
        return view('admin.login');
    }

    public function attempt(Request $request){
        $loginWeb = Auth::guard('web')->attempt([
            'username' => $request->get('username'),
            'password' => $request->get('password'),
        ]);
        $token = null;
        if($loginWeb) {
            $loginApi = $this->authService->attempt([
                'username' => $request->get('username'),
                'password' => $request->get('password'),
            ]);
            $token = $loginApi->getData()['token'];
        }else{
            return response()->json((new ResponseError('Tên tài khoản hoặc mật khẩu không chính xác!')));
        }
        return response()->json($loginApi->toArray());
    }

}

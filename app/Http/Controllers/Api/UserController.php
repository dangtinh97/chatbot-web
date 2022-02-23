<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponseSuccess;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function setWaitConnect()
    {
        dd(Auth::id());
        User::query()->find(Auth::id())->update([
            'wait_connect' => true
        ]);

        return response()->json((new ResponseSuccess())->toArray());
    }
}

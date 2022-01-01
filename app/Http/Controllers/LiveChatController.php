<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class LiveChatController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $userOid = $_COOKIE['user_oid'] ?? null;

        if (is_null($userOid)) {
            $name = User::nameAnimal();
            $user = User::query()->create([
                'full_name' => $name,
                'online_in_browser' => true,
                'password' => Hash::make(time())
            ]);

            $userOid = $user->_id;
            setcookie('user_oid', $userOid);
        }else{
            $find = User::query()->find($userOid);
            $user = !is_null($find) ? $find->first() : null;
        }

        if(is_null($user)){
            unset($_COOKIE['user_oid']);
            return $this->index($request);
        }
        $token = Auth::login($user);
        setcookie('token',$token);
        return view('live-chat.chat',compact('token','userOid','user'));
    }
}

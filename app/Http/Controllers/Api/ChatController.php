<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponseError;
use App\Http\Responses\ResponseSuccess;
use App\Models\SingleChat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\BSON\ObjectId;

class ChatController extends Controller
{
    public function endChat(Request $request)
    {
        $modelSingleChat = SingleChat::query();
        $find = $modelSingleChat->find([
            '_id'=>new ObjectId($request->get('room_oid')),
            '$or'=>[
                ['from_user_oid' => new ObjectId(Auth::id())],
                ['to_user_oid' => new ObjectId(Auth::id())],
            ],
            '$ne' => [
                'status' => SingleChat::STATUS_CLOSE
            ]
        ])->first();
        $user = User::query()->find(Auth::id());
        if(!is_null($user)) $user->update([
            'wait_connect' => false
        ]);
        if(is_null($find)) return response()->json((new ResponseError())->toArray());
        $find->update([
            'status' => SingleChat::STATUS_CLOSE
        ]);

        return response()->json((new ResponseSuccess())->toArray());
    }
}

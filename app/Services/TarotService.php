<?php

namespace App\Services;

use App\Helpers\Crawls\ThienTueCrawlHelper;
use App\Http\Responses\ResponseError;
use App\Http\Responses\ResponseSuccess;
use App\Repositories\UserRepository;
use App\Repositories\UserTarotRepository;
use Carbon\Carbon;

class TarotService
{
    /** @var \App\Repositories\UserRepository  */
    protected $userRepository;
    /** @var UserTarotRepository */
    protected $userTarotRepository;
    public function __construct(UserRepository $userRepository,UserTarotRepository $userTarotRepository)
    {
        $this->userRepository = $userRepository;
        $this->userTarotRepository = $userTarotRepository;
    }

    /**
     * @param string $fbUid
     *
     * @return array|null
     */
    public function showWithUser(string $fbUid):?array
    {
        /** @var \App\Models\User|null $user */
        $user = $this->userRepository->findFirst([
            'fb_uid' => $fbUid
        ]);
        if(is_null($user)) return null;
        $tarot = $user->tarots()->whereDate('created_at',Carbon::now())->first();
        $id = 1;
        $result = [];
        if(is_null($tarot)){
            $result = ThienTueCrawlHelper::boiBaiTarot();
            $create = $this->userTarotRepository->create([
                'user_id' => $user->id,
                'data' => json_encode($result)
            ]);
            $id = $create->id;
        }else{
            $result = json_decode($tarot->data,true);
            $id = $tarot->id;
        }
        return [
            'result' => $result,
            'id' => $id
        ];
    }
}

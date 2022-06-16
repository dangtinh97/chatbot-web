<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\GameScoreService;
use Illuminate\Http\Request;

class GameFlappyBirdController extends Controller
{
    public $gameScoreService;
    public $userRepository;
    public function __construct(GameScoreService $gameScoreService,UserRepository $userRepository)
    {
        $this->gameScoreService = $gameScoreService;
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $userId = 1;

        $fbUid = $request->get('fb_uid','');
        if(!empty($fbUid)){
            $user = $this->userRepository->findFirst([
                'fb_uid' => $fbUid
            ]);
            $userId = $user ?? $user->id;
        }

        $scoreData = $this->gameScoreService->score("FLAPPY_BIRD",1);
        $bestScore = $scoreData['max_score'];
        $yourScore = $scoreData['score'];
        return view('flappy-bird',compact('bestScore','yourScore','userId'));
    }

    public function saveScore(Request $request)
    {
        $score = (int)$request->get('score',0);
        $userId = (int)$request->get('user_id',1);
        $save = $this->gameScoreService->saveScore([
            'user_id' => $userId,
            'score' => $score,
            'name' => $request->get('name','')
        ]);
        return response()->json($save->toArray());
    }
}

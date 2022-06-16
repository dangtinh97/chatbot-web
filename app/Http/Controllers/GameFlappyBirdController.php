<?php

namespace App\Http\Controllers;

use App\Services\GameScoreService;
use Illuminate\Http\Request;

class GameFlappyBirdController extends Controller
{
    public $gameScoreService;
    public function __construct(GameScoreService $gameScoreService)
    {
        $this->gameScoreService = $gameScoreService;
    }

    public function index()
    {
        $userId = 1;
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

<?php

namespace App\Services;

use App\Http\Responses\ApiResponse;
use App\Http\Responses\ResponseSuccess;
use App\Repositories\GameScoreRepository;
use App\Repositories\UserRepository;

class GameScoreService
{
    protected $gameScoreRepository;
    protected $userRepository;
    public function __construct(GameScoreRepository $gameScoreRepository,UserRepository $userRepository)
    {
        $this->gameScoreRepository = $gameScoreRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $data
     *
     * @return \App\Http\Responses\ApiResponse
     */
    public function saveScore(array $data):ApiResponse
    {
        $create = $this->gameScoreRepository->create($data);
        return new ResponseSuccess();
    }

    /**
     * @param string $nameGame
     * @param int    $userId
     *
     * @return array
     */
    public function score(string $nameGame,int $userId):array
    {
        $game = $this->gameScoreRepository->findFistWithOption([
            'name' => $nameGame,
            'user_id' => $userId,
        ],[
            'sort' => "DESC",
            'column_sort' => "score"
        ]);

        $maxScore = $this->gameScoreRepository->findFistWithOption([
            'name' => $nameGame
        ],[
            'sort' => "DESC",
            'column_sort' => "score"
        ]);

        return  [
            'score' => $game ? ($game->score ?? 0) : 0,
            'max_score' => $maxScore ? ($maxScore->score ?? 0) : 0,

        ];
    }
}

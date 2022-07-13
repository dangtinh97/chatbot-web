<?php

namespace App\Services\Admin;

use App\Http\Responses\ApiResponse;
use App\Http\Responses\ResponseSuccess;
use App\Repositories\LogRepository;
use App\Repositories\UserRepository;

class DashboardService
{
    /** @var \App\Repositories\UserRepository $userRepository */
    protected UserRepository $userRepository;

    /** @var \App\Repositories\LogRepository $logRepository */
    protected LogRepository $logRepository;

    public function __construct(
        UserRepository $userRepository,
        LogRepository $logRepository
    ) {
        $this->userRepository = $userRepository;
        $this->logRepository = $logRepository;
    }

    /**
     * @return \App\Http\Responses\ApiResponse
     */
    public function index(): ApiResponse
    {
        $dateNow = date('Y-m-d', time());
        $userNewToday = $this->userRepository->query()->whereDate('created_at', $dateNow)->count();
        $userUseToday = $this->userRepository->query()->whereDate('updated_at', $dateNow)->count();
        $totalUser = $this->userRepository->query()->count();
        $logToday = $this->logRepository->query()->whereDate('created_at', $dateNow)->count();

        return new ResponseSuccess([
            'today_new' => $userNewToday,
            'today_use' => $userUseToday,
            'total_user' => $totalUser,
            'log_request_today' => $logToday
        ]);
    }
}

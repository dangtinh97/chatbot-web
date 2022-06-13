<?php

namespace App\Http\Controllers;

use App\Services\TarotService;
use Illuminate\Http\Request;

class TarotController extends Controller
{
    protected $tarotService;
    public function __construct(TarotService $tarotService)
    {
        $this->tarotService = $tarotService;
    }

    public function showWithUser($fbUid)
    {
        $service = $this->tarotService->showWithUser($fbUid);
        $data = $service['result'];
        $id = $service['id'];
        $url = "https://nguoila.online/boi-bai-tarot/$id";
        return view('tarot-daily',compact('data','id','url'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $list = [
            [
                'id' => 'game',
                'name' => 'Trò chơi',
                'data' => [
                    $this->renderDashboard("Cờ caro", route('game.caro-online')),
                    $this->renderDashboard("Flappy bird", route('game.flappy-bird')),
                    $this->renderDashboard("Dino", route('game.dino')),
                    $this->renderDashboard("2048", route('game.2048')),
                ]
            ],
            [
                'id' => 'application',
                'name' => 'Giải trí',
                'data' => [
                    $this->renderDashboard("Bói bài tarot", route('other.tarot')),
                ]
            ],
            [
                'id' => 'application',
                'name' => 'Ứng dụng',
                'data' => [
                    $this->renderDashboard("Photoshop online", route('photoshop.online'),"https://storage.googleapis.com/datinee-dev/chatbot/photoshop-online.png"),
                ]
            ],

        ];

        return view('index', compact('list'));
    }

    /**
     * @param string $name
     * @param string $url
     * @param string $urlImage
     * @param string $icon
     *
     * @return string[]
     */
    private function renderDashboard(
        string $name,
        string $url,
        string $urlImage = 'https://storage.googleapis.com/datinee-dev/chatbot-default.jpeg',
        string $icon = ''
    ) {
        return [
            'url_image' => $urlImage,
            'name' => $name,
            'icon' => $icon,
            'url' => $url
        ];
    }
}

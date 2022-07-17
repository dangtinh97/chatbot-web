<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
                    $this->renderDashboard("Contra", route('game.contra'),'https://cdn1.hoanghamobile.com/tin-tuc/wp-content/uploads/2020/02/doan-ma-them-mang-trong-contra-1.jpg'),
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
                    $this->renderDashboard("Tạo ảnh slide đẹp tặng người ấy.", route('slide-anh-cua-tui'),"https://storage.googleapis.com/datinee-dev/chatbot/Screen%20Shot%202022-07-01%20at%2023.17.47.png"),
                ]
            ],
            [
                'id' => 'other',
                'name' => 'Nhiều hơn nữa',
                'data' => [
                    $this->renderDashboard("Shopee flash sale", route('shopee.index'),"https://cf.shopee.vn/file/de118843446fcd736b84fece80417d7c_xxhdpi"),
                    ]
            ],
//slide-anh-cua-tui
        ];
        $dataApi = Http::withHeaders([
            'User-Agent'=>'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'
        ])->get("https://shopee-api.j2team.dev/deals?page=".rand(1,16));
        $data = $dataApi->json();

        $items = $data['data'];
        return view('index', compact('list','items'));
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

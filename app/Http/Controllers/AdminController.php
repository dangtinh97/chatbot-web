<?php

namespace App\Http\Controllers;

use App\Helpers\FChatHelper;
use App\Jobs\SendBroadcastJob;
use App\Models\SetupApp;
use App\Models\User;
use App\Services\Admin\SetupAppService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected SetupAppService $setupAppService;
    public function __construct(
        SetupAppService $setupAppService
    )
    {
        $this->setupAppService = $setupAppService;
    }

    public function index()
    {
        return view('admin.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeSetupApp(Request $request):JsonResponse
    {
       $store = $this->setupAppService->store($request->only(['type','data']));
       return response()->json($store->toArray());
    }

    public function setupApp(){
        return view('admin.setup-app');
    }

    public function sendBroadcast()
    {
        $text = "Chết tiệc, cái thằng chết tiệc này mày đang làm cái quái gì vậy hả?
        ******
        \nỒ, hình như lâu rồi chưa thấy bạn quay lại với chúng mình thì phải :( hãy tìm người lạ để trò chuyện ngay nhé. ";

//        $users = User::query()->select('updated_at','fb_uid','id')->orderBy('updated_at')->limit(100)->get();
//        dd($users->toArray());
        $fbIds = ['6414778331871430'];
        $users = User::query()->whereIn('fb_uid',$fbIds)->get();
        foreach ($users as $user){
            SendBroadcastJob::dispatch([
                'user_id' => $user->id,
                'to' => $user->fb_uid,
                'text' => $text,
                'content' => [
                    "attachment" => [
                        'type' => 'template',
                        'payload' => [
                            'template_type' => 'generic',
                            'elements' => [
                                [
                                    "title" => $text,
                                    'image_url' => "https://storage.googleapis.com/datinee-dev/dino-2.png",//$item['image'],
                                    'subtitle' => "Khủng Long Chạy Bộ",//,"QC: ".$item['name']."\nGiá:".$item['price'],
                                    'default_action' => [
                                        'type' => "web_url",
                                        'url' => "https://tool.nguoila.online/game/dino?fb_uid=".$user->fb_uid
                                            ."?utm_source=haui_chatbot",//"https://shopee.vn/shop5nangtien",
                                        "messenger_extensions" => false,
                                        'webview_height_ratio' => "tall",
                                    ],
                                    'buttons' => [
                                        FChatHelper::buttonConnect()
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                'token_page' => SetupApp::query()->where('type','TOKEN_PAGE')->first()->data,
                'name_event' => "SEND_14_07_2022"
            ])->delay(now()->addSeconds(10));
        }
    }
}

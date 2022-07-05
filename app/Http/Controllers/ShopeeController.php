<?php

namespace App\Http\Controllers;

use App\Http\Responses\ResponseSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use NumberFormatter;

class ShopeeController extends Controller
{
    public function index(Request $request)
    {
        /**
         * "product_id" => 4858508277
        "name" => "Set 120 miếng dán kích mắt hai mí GDTIMA tiện dụng chất lượng cao"
        "price" => 10900
        "raw_discount" => 46
        "image" => "eba4501841ecdebc11a483af64d9fa21"
        "short_url" => "https://shp.ee/a337khj"
        "rating_star" => 5
        "shop_location" => "Nước ngoài"
         */
        $page = (int)$request->get('page',1);
        if($page<=0) $page = 1;
        $dataApi = Http::withHeaders([
            'User-Agent'=>'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'
        ])->get("https://shopee-api.j2team.dev/deals?page=$page");
        $data = $dataApi->json();
        $currentPage = $data['current_page'];
//        $data = array_map(function ($item){
//            $fmt = new NumberFormatter( 'VND', NumberFormatter::CURRENCY );
//            $num = "1.234.567,89\xc2\xa0$";
//            echo "We have ".$fmt->parseCurrency($num, $curr)." in $curr\n";
//        },$data);
        $items = $data['data'];
        $nextPage = $currentPage + 1;
        if($nextPage>$data['last_page']) $nextPage = 0;
        if($request->expectsJson()){
            return response()->json((new ResponseSuccess([
                'next_page' => $nextPage,
                'data' => array_map(function ($item){
                    $item['price_text'] = number_format($item['price'], 0, '', '.')."đ";
                    return $item;
                },$items)
            ]))->toArray());
        }
        return view('shopee',compact('items','nextPage'));
    }
}

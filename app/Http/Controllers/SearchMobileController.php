<?php

namespace App\Http\Controllers;

use App\Models\User;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Sunra\PhpSimple\HtmlDomParser;
use Symfony\Component\DomCrawler\Crawler;

class SearchMobileController extends Controller
{
    public function index()
    {
        User::all();

        $url = 'https://tracuusdt.com/';

        $client = new Client();

        $crawler = $client->request('GET', $url);

        $elements = $crawler->filter('.container-fluid.text-center .row')->each(function (Crawler $node){
           return $node->filter('div span a')->each(function (Crawler $node){
                return $node->text();
            });
        });

        $views = $elements[1] ?? [];
        $badTop = $elements[0] ?? [];
        return view('search-mobile.index',compact('views','badTop'));
    }

    public function search($mobile)
    {
        $url = 'https://tracuusdt.com/sodienthoai/'.$mobile;
        $client = new Client();

        $crawler = $client->request('GET', $url);

        $elements = $crawler->filter('.phone-detail.p-3')->each(function (Crawler $node){
            return $node->text();
        });

        $comments = $crawler->filter('.comment-item')->each(function (Crawler $node){
            return [
                'time' => $node->filter('span')->text(),
                'comment' => $node->filter('p')->text()
            ];
        });

        $text = $elements[0] ?? "";
        $text = str_replace(["Tóm lược","Mạng",'Thông tin khác:'],["<->Tóm lược","<->Mạng",'<->Thông tin khác:'],$text);
        $texts = (explode('<->',$text));
        return view('search-mobile.search',compact('mobile','texts','comments'));
    }
}

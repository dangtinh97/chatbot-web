<?php

namespace App\Helpers\Crawls;

use Goutte\Client;
use Illuminate\Support\Facades\Log;
use Symfony\Component\DomCrawler\Crawler;

class ThienTueCrawlHelper
{
    /**
     * @return array
     */
    public static function boiBaiTarot():array
    {
        try{
            $output = [];

            $uri = "https://thientue.vn/boi-bai-tarot.html";
            $client = new Client();
            $crawler = $client->request('GET', $uri);
            $crawler->filter('.tarot-type')->each(function ($node) use (&$output) {
                /** @var Crawler $crawler */
                $crawler = $node->first();
                $text = $crawler->attr('data-detail');
                $typeName = $crawler->attr('data-type_name');
                $typeKey = $crawler->attr('data-type_key');
                $image = $crawler->filter('.card__face--back > img');
                $output[] = [
                    'detail' => $text,
                    'type_name' => $typeName,
                    'type_key' => $typeKey,
                    'image' => "https://thientue.vn". $image->attr('src')
                ];
            });
            return $output;
        }catch (\Exception $exception){
            Log::error($exception);
            return [];
        }

    }
}

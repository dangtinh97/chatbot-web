<?php

namespace App\Helpers\Crawls;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class PhongThuySoHelper
{
    public static function crawl(string $name)
    {
        $url="https://phongthuyso.vn/boi-ai-cap.html";
        $client = new Client();
        $crawler = $client->request('POST', $url,[
            'nameguest' => $name
        ]);
        $crawler->filter('.section_content')->each(function ($node) use (&$output) {
            /** @var Crawler $crawler */
            $crawler = $node->first();
//            $url = $crawler->attr('data-photo-high');
            $output = $crawler->html();
        });
        return $output;
    }
}

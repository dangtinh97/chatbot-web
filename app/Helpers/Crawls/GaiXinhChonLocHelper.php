<?php

namespace App\Helpers\Crawls;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class GaiXinhChonLocHelper
{
    /**
     * @return array
     */
    public static function crawl(): array
    {
        $output = [];
        $uri = "https://gaixinhchonloc.com/page/1";
        $client = new Client();
        $crawler = $client->request('GET', $uri);
        $crawler->filter('.gridItem')->each(function ($node) use (&$output) {
            /** @var Crawler $crawler */
            $crawler = $node->first();
//            $url = $crawler->attr('data-photo-high');
            $url = $crawler->attr('data-photo-250');
            if (!empty($url)) {
                $output[] = $url;
            }
        });
        return $output;
    }
}

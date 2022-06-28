<?php

namespace App\Services;

use App\Helpers\Crawls\GaiXinhChonLocHelper;
use App\Repositories\ImageRepository;

class CrawlerService
{
    protected $imageRepository;
    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }


    public function girl()
    {
       $result =  GaiXinhChonLocHelper::crawl();
       foreach ($result as $url)
       {
           $this->imageRepository->firstOrCreate([
               'url' => $url
           ],[
               'url'  => $url,
               'view' => 0,
               'like' => 0,
               'image' => 'GIRL'
           ]);
       }
       dd("stop");
    }
}

<?php

namespace App\Http\Controllers;

use App\Helpers\Crawls\GaiXinhChonLocHelper;
use App\Services\CrawlerService;
use Illuminate\Http\Request;

class CrawlController extends Controller
{
    public $crawlerService;
    public function __construct(CrawlerService $crawlerService)
    {
        $this->crawlerService = $crawlerService;
    }

    public function girl()
    {
        $this->crawlerService->girl();
    }
}

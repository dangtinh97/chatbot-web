<?php

namespace App\Services\Admin;

use App\Http\Responses\ApiResponse;
use App\Http\Responses\ResponseSuccess;
use App\Models\Block;
use App\Repositories\BlockRepository;
use Illuminate\Support\Arr;

class BlockService
{
    protected $blockRepository;
    public function __construct(BlockRepository $blockRepository)
    {
        $this->blockRepository = $blockRepository;
    }

    /**
     * @param array $params
     *
     * @return \App\Http\Responses\ApiResponse
     */
    public function defaultBlock(array $params):ApiResponse
    {
        $template = [
            'attachment' => [
                'type' => "template",
                'payload' => [
                    'template_type' => "generic",
                    "elements" => [
                        [
                            "title" => Arr::get($params,"title"),
                            "image_url" => Arr::get($params,"image_url"),
                            "subtitle" => Arr::get($params,"subtitle"),
                            'default_action' => Arr::get($params,'type')==="web_url" ? [
                                'type' => "web_url",
                                'url'  =>Arr::get($params,'url',''),
                                'messenger_extensions' => false,
                                'webview_height_ratio' => "tall",
                                'fallback_url' => ''
                            ]:[],
                            'buttons' => [
                                json_decode($params['button'],true),
                                [
                                    'type' => "postback",
                                    'title' => "Menu",
                                    'payload' => "MENU"
                                ]
                            ]
                        ],
                    ]
                ]
            ]
        ];
        $this->blockRepository->firstOrCreate([
            'name' => Block::BLOCK_DEFAULT
        ],[
            'name' => Block::BLOCK_DEFAULT,
            'data' => json_encode($template)
        ]);

        return new ResponseSuccess();
    }
}

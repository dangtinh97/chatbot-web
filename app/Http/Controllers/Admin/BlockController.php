<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlockDefinedStoreRequest;
use App\Services\Admin\BlockService;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    protected $blockService;
    public function __construct(BlockService $blockService)
    {
        $this->blockService = $blockService;
    }

    public function menu()
    {
        return view('admin.block.menu');
    }

    public function menuStore(Request $request)
    {

    }

    public function default()
    {
        return view("admin.block.default");
    }

    public function defaultStore(BlockDefinedStoreRequest $request)
    {
       $result =  $this->blockService->defaultBlock($request->all());
       return response()->json($result->toArray());
    }
}

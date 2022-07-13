<?php

namespace App\Http\Controllers;

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
}

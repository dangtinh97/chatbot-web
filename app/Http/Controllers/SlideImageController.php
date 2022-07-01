<?php

namespace App\Http\Controllers;

use App\Services\SlideImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlideImageController extends Controller
{
    protected $slideImageService;

    public function __construct(SlideImageService $slideImageService)
    {
        $this->slideImageService = $slideImageService;
    }

    public function index(){
        $images = SlideImageService::DEFAULT_SLIDE;
        return view('slider-image',compact('images'));
    }

    public function show($uuid)
    {
        $images = $this->slideImageService->getImageByUUid($uuid);
        return view('slider-image',compact('images'));
    }

    public function create(Request $request)
    {
        $fbUid = (int)$request->get('fb_uid',-1);
        $uuid = Str::uuid();
        return view('create-slide-image',compact('fbUid','uuid'));
    }

    public function store(Request $request)
    {
        $fbUid = (int)$request->get('fb_uid',-1);
        $uuid = $request->get('uuid',Str::uuid());
        $imageIds = explode(",",trim($request->get('images',''),","));
        $save = $this->slideImageService->store($fbUid,$uuid,$imageIds);
        return response()->json($save->toArray());
    }
}

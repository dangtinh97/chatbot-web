<?php

namespace App\Http\Controllers;

use App\Helpers\UploadGoogleHelper;
use App\Http\Responses\ResponseSuccess;
use App\Services\Admin\AttachmentService;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    protected $attachmentService;
    public function __construct(AttachmentService $attachmentService)
    {
        $this->attachmentService = $attachmentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd("a");
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('admin.attachment.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $name = $request->get('name');
        $upload = $this->attachmentService->store($file,$name);
//        sleep(3);
//        $upload = new ResponseSuccess([
//            'id' => rand(1,1000),
//            'path' => '/chatbot/photoshop-onlinepng.png',
//            'url' => 'https://storage.googleapis.com/datinee-dev/chatbot/photoshop-onlinepng.png'
//        ]);
        return response()->json($upload->toArray());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

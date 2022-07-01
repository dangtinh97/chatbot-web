<?php

namespace App\Services\Admin;

use App\Helpers\UploadGoogleHelper;
use App\Http\Responses\ApiResponse;
use App\Http\Responses\ResponseSuccess;
use App\Repositories\AttachmentRepository;
use Illuminate\Http\File;
use Illuminate\Support\Str;

class AttachmentService
{
    public $attachmentRepository;
    public function __construct(AttachmentRepository $attachmentRepository)
    {
        $this->attachmentRepository = $attachmentRepository;
    }

    /**
     * @param \Illuminate\Http\UploadedFile|\Illuminate\Http\UploadedFile[]|array|null $file
     * @param $name
     *
     * @return void
     */
    public function store($file,string $name):ApiResponse
    {
        $mimeType = $file->getMimeType();
        $name = "chatbot/".Str::uuid()."-".Str::slug($name).".".explode("/",$mimeType)[1];
        $upload = UploadGoogleHelper::upload(file_get_contents($file),$name);

        /** @var \App\Models\Attachment $create */
        $create = $this->attachmentRepository->create([
            'path' => $upload['path'],
            'mime_type' => $mimeType,
            'disk' => env('GOOGLE_CLOUD_STORAGE_BUCKET'),
            'deleted_at' => null
        ]);
        return new ResponseSuccess(array_merge($upload,[
            'id' => $create->id
        ]));
    }
}

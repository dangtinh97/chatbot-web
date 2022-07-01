<?php

namespace App\Services;

use App\Helpers\UploadGoogleHelper;
use App\Http\Responses\ApiResponse;
use App\Http\Responses\ResponseError;
use App\Http\Responses\ResponseSuccess;
use App\Repositories\AttachmentRepository;
use App\Repositories\SlideImageRepository;
use App\Repositories\UserRepository;

class SlideImageService
{
    const DEFAULT_SLIDE = [
        "https://64.media.tumblr.com/f922bb670b32ffbbca6ce0cb320d2dde/16bb77e9dc3e5123-54/s250x400/61667def4cc3c792c5baa41d26768af6a9e8d3e2.jpg",
        "https://64.media.tumblr.com/e91c7ecf62e1618556190ddeb2adb80f/50ef04c65e7f087f-af/s250x400/6a81c6743d3212cbb9bc2f1cf44a650ad1b30cfc.jpg",
        "https://64.media.tumblr.com/970f8c9047f214078b5b023089059228/4860ecfa29757f0c-62/s250x400/7afe1320799399ba7272214e4a49880f80785305.jpg",
        "https://64.media.tumblr.com/3fa525467a3cd740860bb4e33ead6d17/c1f852048585269f-d7/s250x400/dae1cbf6e38d4a1888e29733ac3a93ff90985281.jpg",
        "https://64.media.tumblr.com/2672d2341b1735d480b667f9cc56f839/8ad748bd47484711-5a/s250x400/37758ca6009c0ffe4586d35f1d3c6c2bf874cb16.jpg",
        "https://64.media.tumblr.com/4961e775d9e899c113d5f8703ad39e75/683b270f8ac89e3d-79/s250x400/a7d39701eefdc9a12a81c330ceea62262d601dca.jpg",
        "https://64.media.tumblr.com/1ce0049e77454bbdb3a988f1610c1356/e212d4773cb453b4-77/s250x400/38a68f202a4fd87ed80816dd0f1e2b7c834b43f2.jpg",
        "https://64.media.tumblr.com/4fa96dedb6b69ca57035e3b363ec7ef1/bf892d2093180988-34/s250x400/950b2ff62b1ec16aaf13310e40df920316cf80da.jpg",
        "https://64.media.tumblr.com/c00f661f9e65fa536669229ce9e559ed/36f2335db0940cc5-a5/s250x400/2d66eac0f08e9db9ef0f51ff18c5e9cf7694387d.jpg",
        "https://64.media.tumblr.com/c0996e176989df6465649feebe8fe337/fd9a60ba28ddb9a6-dd/s250x400/fe39b34439c2e21f69a5b58ae0d3a7b2d06b7b16.jpg",
    ];

    /** @var \App\Repositories\UserRepository  */
    protected $userRepository;
    protected $slideImageRepository;
    protected $attachmentRepository;
    public function __construct(UserRepository $userRepository,
        SlideImageRepository $slideImageRepository,
    AttachmentRepository $attachmentRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->slideImageRepository = $slideImageRepository;
        $this->attachmentRepository = $attachmentRepository;
    }

    /**
     * @param int    $fbUid
     * @param string $uuid
     * @param array  $imageIds
     *
     * @return \App\Http\Responses\ApiResponse
     */
    public function store(int $fbUid,string $uuid,array $imageIds):ApiResponse
    {
        $uuid .= "-".strtotime('now');
        if(count($imageIds)===0) return new ResponseError();
        $userId = -1;
        if($fbUid!==-1)
        {
            $user = $this->userRepository->findFirst([
                'fb_uid' => $fbUid
            ]);
            $userId = $userId->id ?? -1;
        }
        $dataSave = array_map(function ($id) use ($userId,$uuid){
            return [
                'attachment_id' => (int)$id,
                'user_id' => (int)$userId,
                'uuid' => $uuid,
                'view' => 0
            ];
        },$imageIds);

        $this->slideImageRepository->insert($dataSave);
        return new ResponseSuccess([
            'link' => route("anh-cua-tui-uuid",$uuid)
        ]);

    }

    /**
     * @param string $uuid
     *
     * @return array
     */
    public function getImageByUUid(string $uuid):array
    {
        $find = $this->slideImageRepository->find([
            'uuid' => $uuid
        ]);
        if($find->count()===0) return self::DEFAULT_SLIDE;

        $attachmentIds = $find->pluck('attachment_id')->toArray();
        $attachments = $this->attachmentRepository->whereIn('id',$attachmentIds);
        if($attachments->count()==0) return self::DEFAULT_SLIDE;
        return $attachments->map(function ($attachment){
            return UploadGoogleHelper::prefixUrlStorage().$attachment->path;
        })->toArray();
    }
}

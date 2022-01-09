<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mobile;
use Illuminate\Http\Request;

class SearchMobileController extends Controller
{
    public function search(Request $request)
    {
        $mobile = $request->get('mobile');
        $arraySearch = [
            "count_views" => '/Lượt xem: (.*?) \\//',
            "vote_positive" => '/\\((\d+) tích cực/',
            'vote_negative' => '/tích cực, (\d+) tiêu cực/',
            'vote_other' => '/tiêu cực, (\d+) không chắc chắn/'
        ];

        $result = [];

        foreach ($arraySearch as $key=> $search){
            $result[$key] = 0;
            preg_match($search,$request->get('text'),$matches);
            if(count($matches)===2) $result[$key] = (int)$matches[1];
        }

        $mobileModel = Mobile::query();
        $mobileFind = $mobileModel->where("mobile", $mobile)->first();

        if (is_null($mobileFind)) {
            $mobileModel->create(array_merge([
                'mobile' => $mobile,
                'count_views' => 1,
            ],$result));
        } else {
            $mobileFind->update($result);
            $mobileFind->increment('count_views', 1);
        }

        return response()->json((object)[]);
    }

    public function vote(Request $request)
    {
        $type = $request->get('type');
        $mobileModel = Mobile::query();
        $mobileFind = $mobileModel->where("mobile", $request->get('mobile'))->first();
        if(!is_null($mobileFind)){
            $mobileFind->increment($type."_me",1);
        }

        return response()->json((object)[]);
    }
}

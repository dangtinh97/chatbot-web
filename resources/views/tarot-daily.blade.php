<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:title" content="Bói bài Tarot hàng ngày: Xem online miễn phí, chính xác nhất">
    <title>Bói bài Tarot hàng ngày: Xem online miễn phí, chính xác nhất</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <meta property="og:url" content="{{$url}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:description" content="{{$data[0]['detail']}}"/>
    <meta property="og:image" content="{{$data[0]['image']}}"/>
    <meta name="keywords" content="tarot, nguoila, boi, boi bai, chatbot">
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.png')}}">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-success">Bói bài tarot - ngày hôm nay của bạn:</h1>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach($data as $item)
            <div class="col">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{$item['image']}}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title text-info">{{$item['type_name']}}</h5>
                                <p class="card-text">{{$item['detail']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div id="fb-root"></div>
    <!-- Your share button code -->
    <div class="text-center mb-4">

        <div class="fb-share-button" data-href="https://tool.nguoila.online/boi-bai-tarot" data-layout="button" data-size="large">
            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia
                sẻ</a></div>


        <div class="mt-2">
            <a class="btn btn-danger btn-sm" href="https://tool.nguoila.online/boi-bai-tarot">🔄 Xem lại</a>
        </div>
        <b>Chú ý: Thông tin chỉ mang tính chất giải trí, cảm ơn bạn đã ghé thăm!</b>
    </div>
</div>
@include('incluces/analytics')
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0&appId=450613910111410&autoLogAppEvents=1" nonce="Li6RHGvl"></script>
</body>
</html>

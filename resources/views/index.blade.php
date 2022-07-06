<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Những gì tôi có</title>
    <style>
        .checked {
            color: orange;
        }
    </style>
</head>
<body>
<div class="container w-100">
    @foreach($list as $data)
        <section id="{{$data['id']}}">
            <h1 class="p-3 mb-2 bg-info text-dark text-white mt-4">{{$data['name']}}</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($data['data'] as $info)
                    <a target="_blank" href="{{$info['url']}}">
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{$info['url_image']}}" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{$info['name']}}</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    @endforeach
</div>

<div class="container mt-4">
    <img src="https://i.imgur.com/01dTvdz.png mt-1" style="width: 100%">
    <div class="row row-cols-1 row-cols-md-4 g-4 mt-1" id="list_product">
        @foreach($items as $item)
            <div class="col">
                <div class="card h-100">
                    <img src="https://cf.shopee.vn/file/{{$item['image']}}_tn" class="card-img-top" alt="{{$item['name']}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$item['name']}}</h5>
                        <p class="text-danger fw-bold">{{number_format($item['price'], 0, '', '.')}} ₫ <span class="badge text-bg-primary">Giảm {{$item['raw_discount']}} %</span></p>
                        @for($i=0;$i<$item['rating_star'];$i++)
                            <span class="fa fa-star checked"></span>
                        @endfor
                    </div>
                    <div class="card-footer bg-white" style="border-top: none;">
                        <a target="_blank" class="btn btn-danger d-block mt-2" href="{{$item['short_url']}}">Xem sản phẩm</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center mt-4 mb-4">
            <a id="load_more" class="btn btn-success rounded-pill" href="{{route('shopee.index')}}">Xem thêm ...</a>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

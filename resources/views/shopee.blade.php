<!--
api deals by j2team
-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Trang tổng hợp các mã giảm giá, voucher và deal mới nhất, xịn nhất trên Shopee!">
    <link rel="icon" type="image/x-icon" href="{{asset('shopee-assets/favicon.ico')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Trang chủ - Tổng hợp deal và mã giảm giá Shopee bởi Haui-Chatbot</title>
    <style>
        .checked {
            color: orange;
        }
    </style>
</head>
<body>
<div>
    <div>

    </div>
    <div class="container">
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
            @if($nextPage>0)
            <button id="load_more" class="btn btn-success rounded-pill" data-next-page="{{$nextPage}}">Xem thêm ...</button>
            @endif
        </div>
    </div>
</div>
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script>
    document.addEventListener("DOMContentLoaded",function (){
        let nextPage=2;
        $(this).on('click','#load_more',function (){
            let _this = $(this)
            $.ajax({
                url:"{{route('shopee.index',['page'=>'_page'])}}".replace('_page',nextPage),
                type:"GET",
                dataType:"JSON",
                success:function (res)
                {
                    let data = res.data;
                    console.log(data)
                    if(data.next_page===0) _this.remove()
                    nextPage = data.next_page
                    let items = data.data;
                    items.forEach(function (item){
                        let star = '';
                        for(let i=0;i<item['rating_star'];i++){
                            star +='<span class="fa fa-star checked"></span>';
                        }
                        $("#list_product").append(
                            `<div class="col">
                    <div class="card h-100">
                        <img src="https://cf.shopee.vn/file/${item['image']}_tn" class="card-img-top" alt="${item['name']}">
                        <div class="card-body">
                            <h5 class="card-title">${item['name']}</h5>
                            <p class="text-danger fw-bold">${item['price_text']} ₫ <span class="badge text-bg-primary">Giảm ${item['raw_discount']} %</span></p>
                            ${star}
                            </div>
                            <div class="card-footer bg-white" style="border-top: none;">
                                <a target="_blank" class="btn btn-danger d-block mt-2" href="${item['short_url']}">Xem sản phẩm</a>
                        </div>
                    </div>
                </div>`
                        )
                    })
                }
            })
        })
    })
</script>
@include('incluces.analytics')
</body>
</html>

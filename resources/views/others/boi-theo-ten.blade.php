<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bật mí cách xem bói tên theo thần số học không phải ai cũng biết</title>
    <link rel="shortcut icon" type="image/png" href="https://phongthuyso.vn/templates/site/desktop/img/icons/icon-cungmenh.png">
    <meta name="keywords" content="bói tên, xem bói tên, xem bói theo tên, xem bói tên 2 người, tên theo thần số học, Bói thần số học theo tên">
    <meta name="description" content="Xem bói tên theo thần số học Ai Cập có ý nghĩa gì? Tiết lộ như thế nào về tính cách, vận số, tình duyên? Phương pháp xem tên theo thần số học là gì? Cách đặt tên con hay theo thần số học.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <style>
        .container{
            background: wheat;
            min-height: 100vh;
            height: 100%;
            border-radius: 20px;
        }
        .title_ttv{
            color: #a35f0f;
            font-weight: bold;
            font-size: 2rem;
        }

        .box_saohan{
            box-shadow: 5px 10px #888888bf;
        }

        .box__title_bg_color{
            padding: 5px 5px 0 5px;
            color: white;
            background: #a35f10;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="mb-4 pt-4">
        <h2>{{date('d/m/Y',strtotime('now'))}}</h2>
    </div>
    <div id="form-name" class="box_saohan border border-secondary rounded p-4">
        <p class="title_ttv">Xem bói tên đẹp</p>
        <div class="form_saohan">
            <label>Họ và tên:</label>
            <input id="name" class="form-control mb-2" type="text">
            <button  id="view" type="button" class="btn btn-outline-dark" style="background: #a35f0f;color: wheat">Xem ngay</button>
        </div>
    </div>

    <div id="first" class="mt-4 p-2 bg-gradient-info">
        <strong>
            Xem bói tên theo thần số học là phương pháp dựa vào việc cộng các chữ cái trong tên sau đó quy đổi ra các số để dự đoán về tính cách cũng như vận mệnh của người đó. Vậy cụ thể đó là gì, mời quý bạn đọc cùng khám phá ngay trong bài viết sau đây.
        </strong>
        <div style="text-align:justify">&nbsp;</div>
        <strong>
            1. Giải mã tên theo thần số học có ý nghĩa gì?
        </strong>
        <div style="text-align:justify">&nbsp;</div>
        <span>
            Bói tên kiểu Ai Cập có thể tiết lộ về tính cách của con người, những ưu nhược điểm ra sao. Nhờ đó bạn tìm cách phát huy thế mạnh của bản thân và hạn chế những yếu điểm để hoàn thiện mình ngày càng tốt đẹp hơn. Ngoài ra, xem bói họ tên theo thần số học cho biết sự nghiệp, công danh trong tương lai, tình duyên như thế nào nên được nhiều người lựa chọn để dự đoán những điều có thể xảy ra.
        </span>
    </div>

    <div id="result" class="mt-4 pb-2">

    </div>
</div>
@include('incluces.analytics')
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<script>
    document.addEventListener("DOMContentLoaded",function (){
        $(this).on('click','#view',function (){
            if($("#name").val().trim()==="") return alert("Vui lòng nhập tên để xem kết quả.");
            const _this = $(this)
            $(this).attr('disabled',true)
            $.ajax({
                url:"{{route('others.boi-theo-ten')}}",
                type:"GET",
                data:{
                    name:$("#name").val().trim()
                },
                success:function (res){
                    $("#first").remove()
                    _this.attr('disabled',false)
                    $("#result").html(res.data.html)
                }
            })
        })
    })
</script>
</body>
</html>

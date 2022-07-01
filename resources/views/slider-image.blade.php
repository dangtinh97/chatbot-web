
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('slide-image/css/style.css')}}">
    <link rel="icon" type="image/x-icon" href="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/icon-heart.png">
    <meta name="description" content="♥ Tạo album ảnh 3d chuyển động tuyệt đẹp ♥">
    <meta name="keywords" content="slide image 3d, view ảnh 3d, haui Chatbot">
    <meta name="author" content="Haui Chatbot">
    <title>Haui Chatbot Slide 3D</title>
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://www.facebook.com/hauichatbot">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Tạo slide ảnh 3d by Haui Chatbot">
    <meta property="og:description" content="♥ Tạo slide ảnh 3d by Haui Chatbot ♥">
    <meta property="og:image" content="{{$images[0]}}">
    <style>
        #create-album{
            text-align: center;
            position: fixed;
            z-index: 99999;
            bottom: 10px;
            right: 10px;
        }

        #create-album > span{
            cursor: pointer;
        }

        #create-album > p{
            color: white;
        }

    </style>
</head>
<body>
<div id="drag-container">
    <div id="spin-container">
        @foreach($images as $image)
            <img src="{{$image}}" alt="">
        @endforeach
        <!-- Add your images (or video) here -->
{{--        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/1.jpeg" alt="">--}}
{{--        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/2.jpeg" alt="">--}}
{{--        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/3.jpeg" alt="">--}}
{{--        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/4.jpeg" alt="">--}}
{{--        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/5.jpeg" alt="">--}}
{{--        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/6.jpeg" alt="">--}}
{{--        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/7.jpeg" alt="">--}}
{{--        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/8.jpeg" alt="">--}}
{{--        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/9.jpeg" alt="">--}}
{{--        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/10.jpeg" alt="">--}}

        <!-- Text at center of ground -->
        <p>♥️ Haui Chatbot ♥️</p>
    </div>
    <div id="ground"></div>
</div>
@include('incluces.analytics')
<div id="music-container"></div>
<div id="create-album">
    <p>Tạo album ảnh của bạn.</p>
    <a href="{{route('slide-3d-create.create')}}" style="text-align: center"><icon class="fa fa-plus-circle fa-2x " style="color: #1cc88a"></icon></a>
</div>
<script src="{{asset('slide-image/js/index-obf.js')}}"></script>

<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

<script src="{{asset('slide-image/js/create-heart-obf.js')}}"></script>
</body>
</html>

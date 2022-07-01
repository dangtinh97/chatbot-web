@php
    $first_date = strtotime('2022-03-08');
    $second_date = strtotime('now');
    $datediff = abs($first_date - $second_date);
    $dayLove =  floor($datediff / (60*60*24));
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('slide-image/css/style.css')}}">
    <link rel="icon" type="image/x-icon" href="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/icon-heart.png">
    <meta name="description" content="♥ In Love {{$dayLove}} Days♥">
    <meta name="keywords" content="slide image 3d, view ảnh 3d">
    <meta name="author" content="I with Love">
    <meta name="twitter:title" content="Tình yêu của anh">
    <meta name="twitter:image" content="https://lorempixel.com/400/200/">
    <title>Tình yêu của anh</title>
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://www.facebook.com/profile.php?id=100010063962468">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Tình yêu của anh">
    <meta property="og:description" content="♥ In Love {{$dayLove}} Days♥">
    <meta property="og:image" content="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/IMG_0883.JPG">
</head>
<body>
<div id="drag-container">
    <div id="spin-container">
        <!-- Add your images (or video) here -->
        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/1.jpeg" alt="">
        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/2.jpeg" alt="">
        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/3.jpeg" alt="">
        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/4.jpeg" alt="">
        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/5.jpeg" alt="">
        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/6.jpeg" alt="">
        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/7.jpeg" alt="">
        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/8.jpeg" alt="">
        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/9.jpeg" alt="">
        <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/10.jpeg" alt="">

        <!-- Text at center of ground -->
        <p>Tình yêu của anh ♥️</p>
    </div>
    <div id="ground"></div>
</div>

<div id="music-container"></div>

<script src="{{asset('slide-image/js/index-obf.js')}}"></script>

<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

<script src="{{asset('slide-image/js/create-heart-obf.js')}}"></script>
</body>
</html>

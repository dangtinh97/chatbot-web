<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game Contra</title>
    <script type="text/javascript" src="{{asset('/assets/nes/js/nes.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/assets/nes/css/app.css')}}?v=1">
    <link rel="icon" type="image/x-icon" href="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/icon-heart.png">
    <meta name="description" content="Nếu bạn đã từng chơi Contra trên hệ máy Nitendo 'bốn nút' chắc không thể nào quên được sự hấp dẫn đến kỳ lạ với thể loại hành động trong những năm đầu của thập niên 80. Bạn hãy tiếp tục trổ tài nhanh nhẹn, khéo léo và mưu trí trong trò chơi mang tên Contra.">
    <meta name="keywords" content="game contra , contra, contra online, NES, Nitendo, đầu trọc">
    <meta name="author" content="Game">
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{route('game.contra')}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Game Contra - Game tuổi thơ">
    <meta property="og:description" content="Nếu bạn đã từng chơi Contra trên hệ máy Nitendo 'bốn nút' chắc không thể nào quên được sự hấp dẫn đến kỳ lạ với thể loại hành động trong những năm đầu của thập niên 80. Bạn hãy tiếp tục trổ tài nhanh nhẹn, khéo léo và mưu trí trong trò chơi mang tên Contra.">
    <meta property="og:image" content="https://cdn1.hoanghamobile.com/tin-tuc/wp-content/uploads/2020/02/doan-ma-them-mang-trong-contra-1.jpg">

</head>
<body onload="loadRom()">
<input style="display: none" type="text" id="rom_game" value="{{asset('assets/nes/roms/contra.nes')}}">
<div id="game">
    <div id="game-canvas">
        <div class="_fps">
            <span id="fps"></span> fps
        </div>
        <canvas id="mainCanvas" width="256" height="240"></canvas>
    </div>
    <div id="control" >
        <div id="control-left ms-4" >
            <button id="btn-start" style="display: none" type="button" class="btn btn-primary rounded-pill ms-4">Bắt đầu</button>
{{--            <button id="btn-stop" type="button" class="btn btn-outline-danger rounded-pill ms-2">Tạm dừng</button>--}}
            <p></p>
            <button class="btn btn-outline-info ms-4" id="joyDiv" >
                sử dụng các phím mũi tên
                </p>
                để di chuyển
            </button>
        </div>
        <div id="control-center">

        </div>
        <div id="control-right">
{{--            <button type="button" id="press-b" class="btn btn-lg btn-outline-success rounded-circle me-3">B</button>--}}
{{--            <button type="button" id="press-a" class="btn btn-lg btn-outline-danger rounded-circle me-3">A</button>--}}
            <button class="btn btn-outline-info" style="width: max-content">
                Phím Z => Bắn</p>
                Phím X => Nhảy
            </button>
        </div>
    </div>
</div>
{{--<script type="text/javascript" src="{{asset('/assets/nes/js/joy.min.js')}}"></script>--}}
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('/assets/nes/js/index.js')}}?v=1"></script>
</body>
</html>


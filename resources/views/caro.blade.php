
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Game Cờ Caro</title>
    <link rel="stylesheet" type="text/css" href="{{asset('caro/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('caro/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('caro/css/playing.css')}}">
</head>
<body>
<input id="img_x" style="display: none" value="{{asset('caro/img/x.png')}}">
<input id="img_o" style="display: none" value="{{asset('caro/img/o.png')}}">
<div id = "container">
    <div id = "board-area" class="content-area">

        <div id="info-board">
            <span id="oppo1-time" class="time"> 00:00 </span>&nbsp;
            <img id="oppo1-avartar" class="oppo-avt" src="{{asset('caro/img/oppo-warren.png')}}">
            <img id="vs" src="{{asset('caro/img/vs.png')}}">
            <img id="oppo2-avartar" class="oppo-avt" src="{{asset('caro/img/doraemon.png')}}">&nbsp;&nbsp;
            <span id="oppo2-time" class="time"> 00:00 </span>
            <br/>
            <a href="#" style="font-weight:bold;"> Đại Ca </a><img style="width:16px;" src="{{asset('caro/img/x.png')}}"> đấu với <a href="#" style="font-weight:bold;"> Doraemon </a><img style="width:16px;" src="{{asset('caro/img/o.png')}}">

        </div>
        <div id="board">
            Vui lòng kích hoạt javascript trên trình duyệt của bạn để tải trò chơi!
        </div>
        <div id="board-cpanel">

            <button class="btn1 btn-med" id="newGame" onclick="ctrl.newGame()">
                <i class="fa fa-gamepad fa-2x" aria-hidden="true"></i> Ván mới</button>

            <button class="btn1 btn-med" id="resign" onclick="ctrl.resign()">
                <i class="fa fa-flag-o fa-2x" aria-hidden="true"></i> Chịu thua</button>

            <button class="btn1 btn-med" id="undo" onclick="ctrl.undo()">
                <i class="fa fa-undo fa-2x" aria-hidden="true"></i> Xin đi lại</button>

            <button class="btn1 btn-med" id="quit" onclick="ctrl.standUp()">
                <i class="fa fa-sign-out fa-2x" aria-hidden="true"></i> Thoát</button>

        </div>
        <div id="alert-board">
            <h1>Bạn đã thắng</h1>
        </div>
    </div>


    <h1 id="logo">CARO ONLINE</h1>
    <center><span style="font-size: 12px; font-weight:bold;">Chơi cờ Caro trực tuyến cùng bạn bè!</span></center>


    <div id = "chat" class="content-area">
        <span class="content-area-title"><i class="fa fa-comments-o" aria-hidden="true"></i> Chat</span>
        <div id="chat-content" class="info"></div>
        <input id="chat-message" class="tbox1" type="text" placeholder="Enter để gửi">
        <button id="chat-send" class="btn1 btn-med" type="submit"><i class="fa fa-paper-plane fa-2x" aria-hidden="true"></i></button>
    </div>

    <div id = "notify" class="content-area">
        <span class="content-area-title"><i class="fa fa-info" aria-hidden="true"></i> Thông tin từ hệ thống</span>
        <div id="notify-content" class="info"></div>
    </div>
</div>

<footer class="content-area">
    <p>Online Caro by <a href="https://www.vannotes.com/about-me/">Viet Anh</a></p>
    <p>Đây là phiên bản đang phát triển <br> Mọi chi tiết liên hệ: <a href="mailto:vietanh@vietanhdev.com">vietanh@vietanhdev.com</a></p>
</footer>


</body>
<script type="text/javascript" src="{{asset('caro/js/ai.js')}}"></script>
<script type="text/javascript" src="{{asset('caro/js/board.js')}}"></script>
<script type="text/javascript" src="{{asset('caro/js/caro.js')}}"></script>
<script type="text/javascript" src="{{asset('caro/js/boardCtrl.js')}}"></script>
<script type="text/javascript" src="{{asset('caro/js/referee.js')}}"></script>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NES GAME</title>
    <script type="text/javascript" src="{{asset('/assets/nes/js/nes.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/assets/nes/css/app.css')}}">
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
    <div id="control">
        <div id="control-left">
            <button id="btn-stop" type="button" class="btn btn-outline-danger rounded-pill ms-4">Tạm dừng</button>
            <div id="joyDiv" style="width:200px;height:200px;"></div>
        </div>
        <div id="control-center">

            <button id="btn-start" style="display: none" type="button" class="btn btn-primary rounded-pill">Bắt đầu</button>
        </div>
        <div id="control-right">
            <button type="button" id="press-b" class="btn btn-lg btn-outline-success rounded-circle me-3">B</button>
            <button type="button" id="press-a" class="btn btn-lg btn-outline-danger rounded-circle me-3">A</button>

        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('/assets/nes/js/joy.min.js')}}"></script>
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('/assets/nes/js/index.js')}}"></script>
</body>
</html>


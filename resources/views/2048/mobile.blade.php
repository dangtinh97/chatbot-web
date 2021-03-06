<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game 2048</title>
    <style>

        @import url("https://fonts.googleapis.com/css?family=Roboto:300,400,500");
        @import url("https://fonts.googleapis.com/css?family=Montserrat");
        html, body {
            margin: 0;
            background: #111;
            min-height: 100%;
            font-family: "Montserrat", sans-serif;
            overflow: hidden;
        }

        #mobilewrap {
            position: absolute;
            width: 100%;
            height: 100%;
        }
        #mobilewrap a {
            position: absolute;
            bottom: 5vh;
            right: 5vh;
        }
        #mobilewrap a .fa-twitter {
            font-size: 5vh;
            color: #FF5722;
        }

        #container {
            position: absolute;
            width: 50vh;
            height: 50vh;
            background: #B0BEC5;
            margin: auto;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            border-radius: 0 0 5px 5px;
        }
        #container .score {
            position: absolute;
            display: table;
            top: -9vh;
            width: 22vh;
            height: 10vh;
            background: #B0BEC5;
            border-radius: 5px 0 0 0;
            text-align: center;
            padding-top: 0.5vh;
            box-sizing: border-box;
        }
        #container .score p {
            display: table-cell;
            font-size: 3.5vh;
        }
        #container .score p .title {
            display: block;
            color: #455A64;
        }
        #container .score p .scorefield {
            color: white;
            letter-spacing: 1px;
            font-weight: 600;
        }
        #container .newgame {
            position: absolute;
            top: -9vh;
            right: 0;
            width: 29vh;
            height: 10vh;
            background: #B0BEC5;
            border-radius: 0 5px 0 0;
        }
        #container .newgame .button {
            position: absolute;
            display: table;
            width: 24vh;
            height: 7vh;
            margin: auto;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: #CFD8DC;
            border-radius: 4px;
            text-align: center;
            cursor: pointer;
            transition: box-shadow 0.3s;
        }
        #container .newgame .button:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
            transition: box-shadow 0.3s;
        }
        #container .newgame .button:active {
            box-shadow: inset 0 10px 20px rgba(0, 0, 0, 0.19), inset 0 6px 6px rgba(0, 0, 0, 0.23);
            transition: all 0.3s;
        }
        #container .newgame .button span {
            display: table-cell;
            color: #455A64;
            font-size: 3vh;
            vertical-align: middle;
        }
        #container .over {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.7);
            display: table;
            text-align: center;
            border-radius: 4px;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.5s;
        }
        #container .over span {
            display: table-cell;
            color: #455A64;
            font-size: 5vh;
            vertical-align: middle;
        }
        #container .won {
            position: absolute;
            top: 0;
            left: 50vh;
            width: 70vh;
            height: 100%;
            padding-top: 10vh;
            opacity: 0;
            border-radius: 4px;
            padding-left: 4vh;
            visibility: hidden;
            transition: padding-top 0.3s, opacity 0.4s;
        }
        #container .won .winner {
            display: block;
            color: rgba(255, 255, 255, 0.25);
            font-size: 13vh;
        }
        #container .won .bestscore {
            color: rgba(255, 255, 255, 0.25);
            font-size: 4vh;
        }
        #container .won .numbest {
            color: #FF5722;
            font-size: 4.3vh;
        }
        #container .grid {
            width: 100%;
            height: 100%;
            padding-top: 1vh;
        }
        #container .grid .row {
            position: relative;
            width: 100%;
            height: 10vh;
            padding-left: 1vh;
        }
        #container .grid .row .base {
            position: relative;
            float: left;
            width: 10vh;
            height: 10vh;
            background: #CFD8DC;
            border-radius: 5px;
            margin: 1vh;
            text-align: center;
        }
        #container .tiles {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            padding: 2vh;
            box-sizing: border-box;
        }
        #container .tiles .tile {
            position: absolute;
            width: 10vh;
            height: 10vh;
            border-radius: 5px;
            overflow: hidden;
            transition: box-shadow 0.3s;
        }
        #container .tiles .tile:hover {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
            transition: box-shadow 0.3s;
        }
        #container .tiles .tile .tile_content {
            display: table;
            text-align: center;
            width: 100%;
            height: 100%;
            transform-origin: center center;
            -webkit-animation: pop-up 0.3s ease-in forwards;
            animation: pop-up 0.3s ease-in forwards;
            padding: 1px;
        }
        #container .tiles .tile .tile_content span {
            display: table-cell;
            font-size: 3.5vh;
            vertical-align: middle;
            font-family: "Roboto", sans-serif;
        }

        .tile-2 {
            background: rgba(255, 255, 255, 0.9);
        }

        .tile-4 {
            background: #B3E5FC;
        }

        .tile-8 {
            background: #81D4FA;
        }

        .tile-16 {
            background: #4FC3F7;
            color: white;
        }

        .tile-32 {
            background: #29B6F6;
            color: white;
        }

        .tile-64 {
            background: #03A9F4;
            color: white;
        }

        .tile-128 {
            background: #E6EE9C;
        }

        .tile-256 {
            background: #DCE775;
            box-shadow: 0 0 10px 1px #DCE775;
        }

        .tile-512 {
            background: #D4E157;
            box-shadow: 0 0 15px 1px #D4E157;
        }

        .tile-1024 {
            background: #FFEB3B;
        }

        .tile-2048 {
            background: #FFC107;
            box-shadow: 0 0 10px 1px #FFC107;
        }

        .tile-4096 {
            background: #FF9800;
            box-shadow: 0 0 15px 1px #FF9800;
            color: white;
        }

        .tile-8192 {
            background: #7B1FA2;
            box-shadow: 0 0 10px 1px #7B1FA2;
            color: white;
        }

        @-webkit-keyframes pop-up {
            0% {
                transform: scale(0.4);
            }
            50% {
                transform: scale(1.4);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes pop-up {
            0% {
                transform: scale(0.4);
            }
            50% {
                transform: scale(1.4);
            }
            100% {
                transform: scale(1);
            }
        }
    </style>
</head>
<body>

<div id="mobilewrap">
    <div id="container">
        <div class="score">
            <p> <span class="title">Score</span><span class="scorefield">0</span></p>
        </div>
        <div class="newgame">
            <div class="button"><span>New Game</span></div>
        </div>
        <div class="grid">
            <div class="row">
                <div class="base"></div>
                <div class="base"></div>
                <div class="base"></div>
                <div class="base"></div>
            </div>
            <div class="row">
                <div class="base"></div>
                <div class="base"></div>
                <div class="base"></div>
                <div class="base"></div>
            </div>
            <div class="row">
                <div class="base"></div>
                <div class="base"></div>
                <div class="base"></div>
                <div class="base"></div>
            </div>
            <div class="row">
                <div class="base"></div>
                <div class="base"></div>
                <div class="base"></div>
                <div class="base"></div>
            </div>
        </div>
        <div class="tiles"></div>
        <div class="over"><span>Game Over</span></div>
        <div class="won"><span class="winner">You win!</span><span class="bestscore">BEST SCORE: </span><span class="numbest"> </span></div>
    </div>
</div>
@include('incluces.analytics')
<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js" integrity="sha512-UXumZrZNiOwnTcZSHLOfcTs0aos2MzBWHXOHOuB0J/R44QB0dwY5JgfbvljXcklVf65Gc4El6RjZ+lnwd2az2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    ////// MOBILE GESTURES ////////

    var myElement = document.getElementById('mobilewrap');
    var hammertime = new Hammer(myElement);
    hammertime.get('swipe').set({ direction: Hammer.DIRECTION_ALL });

    hammertime.on('swipeleft', function(ev) {
        moveDirection(37);
    });

    hammertime.on('swiperight', function(ev) {
        moveDirection(39);
    });

    hammertime.on('swipeup', function(ev) {
        moveDirection(38);
    });

    hammertime.on('swipedown', function(ev) {
        moveDirection(40);
    });

    /* ---------------------------------------------------------------------- */

    var matrix = [[0,0,0,0],
        [0,0,0,0],
        [0,0,0,0],
        [0,0,0,0]];
    var component = new Array();
    var best = 0;
    var score = 0;

    $(".button").on("click", function(){
        restoreField();
        init();
    });

    init();

    function restoreField(){
        score = 0;
        $(".scorefield").text(score);
        matrix = [[0,0,0,0],
            [0,0,0,0],
            [0,0,0,0],
            [0,0,0,0]];
        component = new Array();
        $('.tiles').remove();
        $("#container").append("<div class='tiles'></div>");
        $(".over").css("visibility", "hidden").css("opacity", "0");
    }

    function random(min, max) {
        return Math.floor((Math.random() * max) + min);
    }

    function dueoquattro(){
        return (((Math.random() * 10) > 5) ? 4 : 2);
    }

    function init(){
        var i = 0;
        while(i < 2){
            var x = random(0, 4);
            var y = random(0, 4);

            if(matrix[x][y] == 0){
                i++;
                matrix[x][y] = dueoquattro();
                component.push({x: x, y: y});

                updateTile(12 * x, 12 * y, x, y);
            }
        }
    }

    function updateTile(trax, tray, x, y){
        $(".tiles").append("<div class='tile tile-" + matrix[x][y] + " tile-" + x + "-" + y + "' style='transform: translate(" + trax + "vh, " + tray + "vh);'><div class='tile_content'><span>" + matrix[x][y] + "</span></div></div>");
    }

    window.addEventListener('keydown',this.direction,false);

    function compare(a,b) {
        if(dx == 1){
            if (a.x < b.x)
                return -1;
            if (a.x > b.x)
                return 1;
            return 0;
        }
    }

    function moveDirection(code){
        var change = 0;
        switch(code){
            case 37:
                component.sort(function(a, b){if(a.x < b.x){return -1;}if(a.x > b.x){return 1;}return 0;});
                change = move(-1,0);
                break;
            case 38:
                component.sort(function(a, b){if(a.y < b.y){return -1;}if(a.y > b.y){return 1;}return 0;});
                change = move(0,-1);
                break;
            case 39:
                component.sort(function(a, b){if(a.x > b.x){return -1;}if(a.x < b.x){return 1;}return 0;});
                change = move(1,0);
                break;
            case 40:
                component.sort(function(a, b){if(a.y > b.y){return -1;}if(a.y < b.y){return 1;}return 0;});
                change = move(0, 1);
                break;
        }

        if(change > 0){
            addTile();
        }

        if(checkDefeat()){
            $(".over").css("visibility", "visible").css("opacity", "1");
        }

    }

    function checkDefeat(){
        if(component.length == 16){
            for(var i = 0; i < component.length; i++){
                for(var x = -1; x <= 1; x++){
                    for(var y = -1; y <= 1; y++){
                        if(x != y && Math.abs(x) != Math.abs(y)){
                            if(isMovePossible(component[i].x, component[i].y, x, y, i)){
                                return false;
                            }
                        }
                    }
                }
            }

            return true;
        }
    }

    function won(){
        $(".won").css("visibility", "visible").css("padding-top", "0px").css("opacity", 1);
    }

    function direction(e) {
        moveDirection(e.keyCode);
    }

    function addTile(){
        var i = 0;
        while(i < 1){
            var x = random(0, 4);
            var y = random(0, 4);

            if(matrix[x][y] == 0){
                i++;
                matrix[x][y] = dueoquattro();
                component.push({x: x, y: y});

                updateTile(12 * x, 12 * y, x, y);
            }
        }
    }

    function move(dx, dy){
        var change = 0;
        for(var i = 0; i < component.length; i++){
            while(isMovePossible(component[i].x, component[i].y, dx, dy, i)){
                makeMove(component[i].x, component[i].y, dx, dy, i);
                change++;
                if(component[i].x != -1 && component[i].y != -1){
                    component[i].x +=  dx;
                    component[i].y +=  dy;
                }
            }
        }

        checkTrash();
        return change;
    }

    function makeMove(x, y, dx, dy, i){
        var newX = x + dx;
        var newY = y + dy;
        var newValue = matrix[x][y] + matrix[newX][newY];

        if(matrix[newX][newY] == matrix[x][y]){
            component[i].x = -1;
            component[i].y = -1;
            score += newValue;
            $(".scorefield").text(score);
            if(score > best){
                best = score;
                $(".numbest").text(best);
            }
        }

        matrix[newX][newY] = newValue;
        matrix[x][y] = 0;

        updateTile(12 * newX, 12 * newY, newX, newY);
        $('.tile-' + x + '-' + y + '').remove();

        if(newValue == 2048){
            won();
        }
    }

    function checkTrash(){
        for(var i = 0; i < component.length; i++){
            if(component[i].x == -1 && component[i].y == -1){
                component.splice(i, 1);
            }
        }
    }

    function isMovePossible(x, y, dx, dy, i){
        var newX = x + dx;
        var newY = y + dy;

        if(newX < 4 && newX >= 0 && newY < 4 && newY >= 0){
            if(matrix[newX][newY] == 0){
                return true;
            }else if(matrix[newX][newY] == matrix[x][y]){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

</script>
</body>
</html>


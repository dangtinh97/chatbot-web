{{--https://codepen.io/ju-az/pen/eYJQwLx/--}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('flappy-bird/css/index.css')}}">
    <title>Flappy Bird</title>
</head>
<body>
<input type="number" value="{{$userId ?? 1}}" id="user_id" style="display: none">
<header>
    <div class="score-container">
        <div id="bestScore">{{$yourScore ?? 0}}</div>
        <div id="currentScore"></div>
    </div>
</header>
<canvas id="canvas" width="431" height="768"></canvas>
<div class="suggest">
    <p>tap to play</p>
    <p>Best score: <b id="server-best-score">{{$bestScore ?? 10}}</b></p>
</div>
<footer>
    <h1>Flappy Bird</h1>
</footer>

<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<script src="{{asset('flappy-bird/js/index.js')}}"></script>
<script>
    const URL = {
        'save_score':'{{route('api.game.save_score')}}'
    }
</script>
@include('incluces/analytics')
</body>
</html>

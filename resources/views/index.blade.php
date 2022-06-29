<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Những gì tôi có</title>
</head>
<body>
<div class="container">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

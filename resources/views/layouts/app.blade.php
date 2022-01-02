<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cảnh giác với trò lừa đảo nháy máy">
    <meta name="keywords" content="nguoila, nguoila.online">
    <meta property="og:title" content="Cách tránh trò lừa đảo nháy máy">
    <meta property="og:url" content="https://nguoila.online">
    <meta property="og:image" content="https://tieudung.vn/dataimages/202106/07/huge/canhbaoluadao_1623050153.jpg">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/v4-shims.min.css" integrity="sha512-p++g4gkFY8DBqLItjIfuKJPFvTPqcg2FzOns2BNaltwoCOrXMqRIOqgWqWEvuqsj/3aVdgoEo2Y7X6SomTfUPA==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
    <title>NGUOI LA ONLINE</title>
    <style>
        body, html {
            height: 100%;
        }

        a:link {
            text-decoration: none;
        }

        /*footer {*/
        /*    position:fixed;*/
        /*    bottom:0;*/
        /*    width:100%;*/
        /*    height:60px;*/
        /*}*/
    </style>
</head>
<body class="bg-dark " style="width: 100%">
<header class="bg-danger " style="height: 60px">
    <div class="d-flex container">
        <h1 class="text-white"><a class="text-white" href="{{route('nguoi-la')}}">nguoila.online</a></h1>
    </div>
</header>
<div class="container">
    <div class="input-group mb-3 mt-2">
        <input type="text" id="mobile" class="form-control bg-dark text-success fs-3"
               placeholder="Tìm kiếm số điện thoại" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button onclick="search();" class="btn btn-outline-secondary" type="button" id="button-addon2">Tìm kiếm</button>
    </div>
    <div>
        @yield('content')
    </div>
</div>
<footer class="text-center mt-4" style=""><a href="{{route('dieu-khoan')}}">điều khoản điều kiện</a></footer>
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script>
    document.getElementById('mobile').addEventListener("keyup", function (event) {
        if (event.key === "Enter") {
            return search()
        }
    });


    function search() {
        let mobile = document.getElementById('mobile')
        if (mobile.value.trim() === "") return false;
        document.getElementById('button-addon2').innerHTML = "Xin chờ...";
        window.location.href = '{{route('search','_mobile')}}'.replace('_mobile', mobile.value.trim())
    }

    async function request(url, method = "GET", data = {}) {
        let response = null;
        await $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': '{{@csrf_token()}}'
            },
            type: method,
            data: data,
            success: (res) => {
                response = res
            }
        }).catch((e) => {
            console.log(e, "error")
            response = {
                status: 500,
                content: "ERROR SERVER",
                data: {}
            }
        })

        return response;
    }
</script>
@yield('scripts')
</body>
</html>

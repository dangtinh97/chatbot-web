<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Trò chuyện , tâm sự cùng với những người lạ!">
    <meta name="keywords" content="nguoila, nguoila.online">
    <meta property="og:title" content="Trò chuyện , tâm sự cùng với những người lạ!">
    <meta property="og:url" content="https://nguoila.online/live-chat">
    <meta property="og:image" content="{{asset('assets/images/logo-page.png')}}">
    <link rel="icon" href="https://storage.cloud.google.com/monstar-lab/logo-page.ico">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Người lạ ơi!</title>
    <link rel="stylesheet" href="{{asset('assets/css/page-chat.css')}}">
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </head>
<body class="bg-dark">

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="staticBackdropBody">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng lại</button>
                <button type="button" class="btn btn-primary" id="staticBackdropConfirm">Understood</button>
            </div>
        </div>
    </div>
</div>

@yield('content')
<script>
    function setModalStatic(data={})
    {
        $("#staticBackdropLabel").html(data.title ?? "")
        $("#staticBackdropBody").html(data.body ?? "")
        $("#staticBackdropConfirm").html(data.btn_confirm ?? "")
    }

    function getCookie(name=''){
        name+="="
        const cookies = document.cookie.split(';')
        let value='';
        cookies.forEach(function (cookie){
            cookie = cookie.trim()
            if(cookie.indexOf(name)===0){
                value = cookie.replace((name),'')
            }
        })
        return value;
    }

    async function request(url, method = "GET", data = {}) {
        let response = null;
        await $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': '{{@csrf_token()}}',
                'Authentication':'Bearer '+getCookie('token')
            },
            typeData:"JSON",
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

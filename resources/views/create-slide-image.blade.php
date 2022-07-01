<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tạo album ảnh 3d</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('slide-image/css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <style>
        body {
            overflow-x: hidden;
            background: black;
        }

        #l-add-image {
            border: 3px dotted #5e5e5e;
            padding: 10px 30px;
            text-align: center;
            width: max-content;
        }

        #l-add-image > label {
            cursor: pointer;
        }

        #form-add-image > picture > div, #form-add-image > picture > label {
            width: 30%;
            min-width: 30%;
        }


        #drag-container {
            margin-top: 20vh;
        }

        @media only screen and (max-width: 480px) {
            /* STYLES HERE for BROWSER WINDOWS with a max-width of 480px.
               This will work on desktops when the window is narrowed.  */
            #drag-container {
                margin-top: 7vh !important;
            }
        }

        label {
            cursor: pointer;
        }

        @media only screen and (max-width: 668px) {
            /* STYLES HERE for BROWSER WINDOWS with a max-width of 480px.
               This will work on desktops when the window is narrowed.  */
            #drag-container {
                display: none !important;
            }

            body {
                overflow-y: auto !important;
            }

            #demo {
                display: block !important;
            }
        }

        ._delete_img {
            border-radius: 50%;
            cursor: pointer;
            position: absolute;
            right: 2px;
            top: -4px;
        }

        ._image_slide {
            position: relative;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-md-9 col-xs-9" id="frame-slide">
        <div id="demo" style="display: none">
            <img style="width: 100%" src="{{asset('assets/images/demo.png')}}">
        </div>
        <div id="drag-container">
            <div id="spin-container">

                <!-- Add your images (or video) here -->
{{--                                "https://64.media.tumblr.com/f922bb670b32ffbbca6ce0cb320d2dde/16bb77e9dc3e5123-54/s250x400/61667def4cc3c792c5baa41d26768af6a9e8d3e2.jpg",--}}
{{--                                "https://64.media.tumblr.com/e91c7ecf62e1618556190ddeb2adb80f/50ef04c65e7f087f-af/s250x400/6a81c6743d3212cbb9bc2f1cf44a650ad1b30cfc.jpg",--}}
{{--                                "https://64.media.tumblr.com/970f8c9047f214078b5b023089059228/4860ecfa29757f0c-62/s250x400/7afe1320799399ba7272214e4a49880f80785305.jpg",--}}
{{--                                "https://64.media.tumblr.com/3fa525467a3cd740860bb4e33ead6d17/c1f852048585269f-d7/s250x400/dae1cbf6e38d4a1888e29733ac3a93ff90985281.jpg",--}}
{{--                                "https://64.media.tumblr.com/2672d2341b1735d480b667f9cc56f839/8ad748bd47484711-5a/s250x400/37758ca6009c0ffe4586d35f1d3c6c2bf874cb16.jpg",--}}
{{--                                "https://64.media.tumblr.com/4961e775d9e899c113d5f8703ad39e75/683b270f8ac89e3d-79/s250x400/a7d39701eefdc9a12a81c330ceea62262d601dca.jpg",--}}
{{--                                "https://64.media.tumblr.com/1ce0049e77454bbdb3a988f1610c1356/e212d4773cb453b4-77/s250x400/38a68f202a4fd87ed80816dd0f1e2b7c834b43f2.jpg",--}}
{{--                                "https://64.media.tumblr.com/4fa96dedb6b69ca57035e3b363ec7ef1/bf892d2093180988-34/s250x400/950b2ff62b1ec16aaf13310e40df920316cf80da.jpg",--}}
{{--                                "https://64.media.tumblr.com/c00f661f9e65fa536669229ce9e559ed/36f2335db0940cc5-a5/s250x400/2d66eac0f08e9db9ef0f51ff18c5e9cf7694387d.jpg",--}}
{{--                                "https://64.media.tumblr.com/c0996e176989df6465649feebe8fe337/fd9a60ba28ddb9a6-dd/s250x400/fe39b34439c2e21f69a5b58ae0d3a7b2d06b7b16.jpg",--}}
                <!-- Text at center of ground -->
                <p>♥️ Haui Chatbot ♥️</p>
            </div>
            <div id="ground"></div>
        </div>
        <div id="music-container"></div>
    </div>
    <div id="form-add-image" class="col-md-3 col-xs-3 text-center mt-4">
        <div>
            <label for="inp-image"><img style="width: 30%" class="img-fluid img-thumbnail" src="{{asset('assets/images/image-upload.png')}}" id=""></label>
            <p class="text-white">Tải ảnh lên: <b id="count-image">0</b>/<b>8</b></p>
        </div>
        <picture class="row text-center img-slider__container-1" id="list-preview">
            <div id="loading-1" class="_default">
                <img src="https://kravmaganewcastle.com.au/wp-content/uploads/2017/04/default-image-620x600.jpg" class="img-fluid img-thumbnail rounded" alt="...">
            </div>
            <div id="loading-2" class="_default">
                <img src="https://kravmaganewcastle.com.au/wp-content/uploads/2017/04/default-image-620x600.jpg" class="img-fluid img-thumbnail" alt="...">
            </div>
            <div id="loading-3" class="_default">
                <img src="https://kravmaganewcastle.com.au/wp-content/uploads/2017/04/default-image-620x600.jpg" class="img-fluid img-thumbnail" alt="...">
            </div>
            {{--            <div class="" id="loadding">--}}
            {{--                <img src="https://i.stack.imgur.com/IA7jp.gif" class="img-fluid img-thumbnail rounded" alt="...">--}}
            {{--            </div>--}}
            {{--            <div class="">--}}
            {{--                <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/10.jpeg" class="img-fluid img-thumbnail" alt="...">--}}
            {{--            </div>--}}
            {{--            <div class="">--}}
            {{--                <img src="https://storage.googleapis.com/datinee-dev/chatbot/tinh-yeu-cua-anh/10.jpeg" class="img-fluid img-thumbnail" alt="...">--}}
            {{--            </div>--}}
        </picture>
        <input multiple accept="image/*" type="file" id="inp-image" style="display: none">
        <div class="mt-4">
            <button id="btn-upload" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="display: none">
{{--                <span class="spinner-border spinner-border-sm" style="display: none" role="status" aria-hidden="true"></span>--}}
                <span><icon class="fa fa-save"></icon></span>
                <b>Lưu slide 3D</b>
            </button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Lưu lại những bức ảnh đẹp của bạn</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="text-danger" style="display: none" id="show-notify">Click vào input để xem slide ảnh 3d</label>
                <input id="result" placeholder="Link chia sẻ cùng bạn bè" type="text" class="form-control">
            </div>
            <div class="modal-footer">
                <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                <button type="button" class="btn btn-primary" id="btn-submit">Lưu</button>
            </div>
        </div>
    </div>
</div>
@include('incluces.analytics')
<script src="{{asset('slide-image/js/index-obf.js')}}"></script>
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let countImage = 0;
        let maxImage = 8;
        //api.attachment-user.post
        $(this).on("change", '#inp-image', function () {
            let img = $(this)[0].files[0];
            if(typeof img==="undefined" || countImage>=maxImage) return;
            buttonDisabled(true)
            upload(img.name, img, function (res) {
                countImage++;

                let url = res.data.url;
                let id = res.data.id;
                $("#spin-container").append(`<img src="${url}" id="slide-${id}-img" alt="">`)
                buttonDisabled(false)
                $("#list-preview").append(`            <div class="mt-2 _image_slide img-items" id="image-${id}">
                <span data-id="${id}" class="bg-danger _delete_img "><icon class="fa fa-trash text-white m-2"></icon></span>
                <img id="image-${id}-preview" src="${url}" class="img-thumbnail" alt="...">
            </div>`)

                // $(`#image-${id}-preview`).css('height',document.getElementById(`image-${id}-preview`).offsetWidth+"px")
                // document.getElementById(`image-${id}`).setc
                if (countImage <= 3) {
                    $("#loading-" + countImage).remove()
                }
                setCountImage()
            })
        })

        function setCountImage()
        {
            let spin = document.getElementById('spin-container').getElementsByTagName('img')
            for (let i=0;i<spin.length;i++){
                let divDeg = 360/spin.length;
                let deg = 360 - (360/spin.length + i*divDeg);
                let time = (i+1) * 0.25;
                let css =  `transform: rotateY(${deg}deg) translateZ(240px); transition: transform 1s ease ${time}s`
                $(spin[i]).css({
                    'transform' : `rotateY(${deg}deg) translateZ(240px)`,
                    'transition' : `transform 1s ease ${time}s`
                })
            }

            if(countImage>=3){
                 $("#btn-upload").fadeIn();
            }else {
                 $("#btn-upload").fadeOut();

            }
            return $("#count-image").html(countImage)
        }

        $(this).on('click', '._delete_img', function () {
            let parent = $(this).parent();
            let dataId = $(this).data('id')
            $(`#slide-${dataId}-img`).remove()
            parent.remove()
            countImage--;

            if (countImage < 3) {
                let haveImage = document.getElementsByClassName('_default').length;
                $("#list-preview").append(`<div id="loading-${haveImage+1}">
                <img src="https://kravmaganewcastle.com.au/wp-content/uploads/2017/04/default-image-620x600.jpg" class="img-fluid img-thumbnail" alt="...">
            </div>`)
            }
            setCountImage()
        })

        function upload(name, file, callback) {
            let formData = new FormData();
            formData.append('name', name)
            formData.append('file', file)
            $.ajax({
                url: "{{route('api.attachment-user.post')}}",
                type: "POST",
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
                headers: {
                    Authorization: "Bearer " + window.localStorage.getItem('token')
                },
                data: formData,
                success: function (res) {
                    return callback(res);
                }
            })
        }

        function buttonDisabled(disabled) {
            if (disabled) {
                $("#list-preview").append(`<div class="mt-2" id="image-loading">
                <img src="https://i.stack.imgur.com/IA7jp.gif" class="img-fluid img-thumbnail rounded" alt="...">
            </div>`)
            } else {
                $("#image-loading").remove()
            }
        }

        $(this).on("click",'#btn-submit',function (){
            let imageIds = "";
            let _this = $(this)
            let idsFromDelete  = document.getElementsByClassName('_delete_img')
            for(let i=0;i<idsFromDelete.length;i++){
                imageIds+=idsFromDelete[i].dataset.id+",";
            }
            _this.attr('disabled',true).html("Đang xử lý...")
            $.ajax({
                url:"{{route('slide-3d-create.store')}}",
                type:"POST",
                dataType:"JSON",
                data:{
                    fb_uid:'{{$fbUid}}',
                    uuid:"{{$uuid}}",
                    images:imageIds,
                    _token:"{{csrf_token()}}"
                },
                success:function (res){
                    _this.attr('disabled',false).html("Lưu")
                    $("#show-notify").fadeIn()
                    $("#result").val(res.data.link)

                }
            })
        })

        $(this).on("click",'#result',function (){
            let link = $(this).val().trim()
            if(link!=="") return window.location.href = link
        })

        $('#staticBackdrop').on('shown.bs.modal', function () {
            $("#show-notify").fadeOut()
            $('#result').val('')
        })
    })
</script>
</body>
</html>

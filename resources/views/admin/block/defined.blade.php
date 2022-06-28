@extends('admin.layouts.app')
@section('page-heading','Cấu hình block menu')
@section('style')
    <style>
        input[type=text]:focus {
            outline: none;
            border: 1px solid red;
        }
        #type_button{
            display: flex;
            justify-content: space-between;
        }

        #type_button > li{
            list-style: none;
        }

        #type_button> li.selected{
            border-bottom: 3px solid brown;
            padding: 3px;
        }

        .card-body > input{
            margin-bottom: 5px;
        }
    </style>
@endsection
@section('content')

    <div class="card _menu_gallery" style="width: 25rem;">
        <div class="card-header">BLOCK Mặc định</div>
        <div class="card-body">
            <input class="form-control" type="text" id="url_image" placeholder="url image">
            <input class="form-control" type="text" id="title" placeholder="title">
            <input class="form-control" type="text" id="subtitle" placeholder="subtitle">
            <select id="type" class="form-control mb-2">
                <option data-value="postback">POSTBACK</option>
                <option selected data-value="web_url">WEB URL</option>
            </select>
            <input class="form-control" type="text" id="name_button" placeholder="name button">
            <input class="form-control" type="text" id="url" placeholder="URL/BLOCK">
        </div>
        <div class="card-footer">
            <button class="btn btn-success" type="button" id="submit"><icon class="fa fa-save text-white"></icon> Lưu</button>
        </div>
    </div>
@endsection


@section('script')
    <script>
        document.addEventListener("DOMContentLoaded",function (){
            $(this).on("click",'#submit',function (){
                let type = $("#type").find(":selected").data('value')
                let button  = type==="web_url" ? {
                    "type":"web_url",
                    "url": $("#url").val().trim()+"?fb_uid=_fb_uid",
                    "title":$("#name_button").val().trim()
                }:{
                    "type":"postback",
                    "title":$("#name_button").val().trim(),
                    "payload": $("#url").val().trim()
                }
                request('{{route('api.defined.store')}}',"POST",{
                    image_url:$("#url_image").val().trim(),
                    title:$("#title").val().trim(),
                    subtitle:$("#subtitle").val().trim(),
                    button:JSON.stringify(button),
                    url:$("#url").val().trim(),
                    type:type
                })
            })
        })
    </script>
@endsection


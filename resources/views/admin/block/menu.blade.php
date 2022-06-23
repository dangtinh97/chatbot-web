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
</style>
@endsection
@section('content')
    @php $idGallery = time() @endphp
    <div class="card _menu_gallery" data-block-name="MENU" data-sort="1" data-gallery-id="{{$idGallery}}" style="width: 25rem;">
        <div class="card-header">
            <div>
                <div class="custom-control custom-switch">
                    <input type="checkbox" checked class="custom-control-input" id="status_gallery_{{$idGallery}}">
                    <label class="custom-control-label" for="status_gallery_{{$idGallery}}"></label>
                </div>
            </div>
            <ul>
                <li>SQUARE</li>
                <li>RECTANGLE</li>
            </ul>
        </div>
        <div class="card-body">
            <div>
                <img src="https://smaxcdn.s3.ap-southeast-1.amazonaws.com/bot/62a0ef5c1eb5791a6bafe125/card/c_62ab82a6d4cfe1e2dde91537-t_1655407452998-cropped-1655407452901.png" class="card-img-top" alt="...">
                <input type="text" class="form-control" data-gallery-id="{{$idGallery}}" placeholder="Heading (required) ..." name="title_gallery">
                <input type="text" class="form-control" data-gallery-id="{{$idGallery}}" placeholder="Subtitle or description ..." name="subtitle_gallery">
                <input type="text" class="form-control" data-gallery-id="{{$idGallery}}" placeholder="Link ..." name="link_gallery">
            </div>
            <div class="mt-2 " data-id="1">
                <div class="_gallery_button" data-gallery-id="{{$idGallery}}">

                </div>
                <button type="button" class="btn  btn-outline-secondary w-100 _new_button_gallery" data-gallery-id="{{$idGallery}}" >+ New button</button>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-secondary _delete_gallery" data-gallery-id="{{$idGallery}}">Delete</button>
            <button type="button" class="btn btn-primary _save_gallery" data-gallery-id="{{$idGallery}}" >Save</button>
        </div>
    </div>
@endsection

<div class="modal fade" data-button-id="" id="modalNewButton" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="staticBackdropLabel">Button</h3>
            </div>
            <div class="modal-body">
                <div class="form-group-">
                    <label>Button title</label>
                    <input id="menu_button_name" type="text" class="form-control" placeholder="Nhập tên button ...">
                </div>
                <div>
                    <ul id="type_button">
                        <li data-type="postback">BLOCK</li>
                        <li data-type="web_url" class="selected">URL</li>
                        <li>PHONE</li>
                        <li>BOTPLUS</li>
                    </ul>
                </div>
                <div>
                    <section data-type="web_url">
                        <input type="text" id="web_url" class="form-control" placeholder="Nhập url ...">
                    </section>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Delete</button>
                <button type="button" class="btn btn-primary _create_button_modal">Save</button>
            </div>
        </div>
    </div>
</div>


@section('script')
    <script>
        let buttons = Array()
        let attachment = [];
        //data-gallery-id

        document.addEventListener("DOMContentLoaded",function (){
            $(this).on('click','._new_button_gallery',function (){
                const idGallery = $(this).data('gallery-id');
                let listButton = $('._gallery_button[data-gallery-id="'+idGallery+'"]');
                if(listButton.children().length>=3) return;
                $('#modalNewButton').modal({
                    show:true
                }).attr('data-button-id','menu_button_id_'+(new Date()).getTime()).attr('data-gallery-id',idGallery)
            })

            $(this).on('click','#create_button_modal',function ()
            {
                let idButton  = $("#modalNewButton").attr('data-button-id')
                let buttonName = $("#menu_button_name").val().trim();
                let url = $("#web_url").val().trim()
                if(url==="" || buttonName==="") return
                buttons.push({
                    id:idButton,
                    title:buttonName,
                    type_button:"web_url",
                    url:url
                })
                $('._gallery_button').append(`<button data-button="${idButton}" type="button" class="text-primary btn mb-1 btn-outline-secondary w-100 _btn_new">${buttonName}</button>`)
                $('#modalNewButton').modal('hide')
                $("#menu_button_name").val('')
                $("#web_url").val('')
            })
        })
    </script>
@endsection

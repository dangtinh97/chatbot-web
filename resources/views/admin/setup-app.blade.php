@extends('admin.layouts.app')
@section('content')

    <div class="form-group col-9">
        <div class="form-group">
            <label>data</label>
            <textarea class="form-control" id="data"></textarea>
        </div>
        <div class="form-group">
            <label>type</label>
            <input type="text" id="type" class="form-control">
        </div>
        <button  id="add" type="button" class="btn btn-danger mt-4">Thêm</button>
    </div>

@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            $(this).on('click','#add',function (){
                $(this).attr('disabled',true)
                request('{{route('api.admin.setup-app.store')}}','POST',{
                    type:$("#type").val().trim(),
                    data:$("#data").val().trim()
                }).then(function (res){
                    alert(res.content)
                    return window.location.reload()
                })
            })

        })
    </script>
@endsection

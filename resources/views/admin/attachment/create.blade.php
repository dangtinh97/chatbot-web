@extends('admin.layouts.app')
@section('content')

    <div class="card" style="width: 40rem;">
        <div class="card-header">
            Upload File
        </div>
        <div class="card-body">
            <div style="position: relative">
                <img height="450" id="output" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACoCAMAAABt9SM9AAAAElBMVEXy8vL////6+vr19fX4+Pj8/Px/aeudAAACoklEQVR4nO3c227bMBBF0cgk//+XGwu6kRxeRnFaVGevt8a2AG3QQ0kN8vUFAAAAAAAAAAAAAAAAAAAAAACAv2j5Ba9/fVK/hVgOxHL4Prf0+qD08FgfPbfw8Fjpk8cjlgOxHIjlQCwHYjlIxgoh3DqeXqyQbl+Ky8VK551L9B5PLFb40X2eWKyf3RVrxUpFrMU36KVihbKV88pCKtarfjzlWlpSsepWvh1RPZbr3JVi1SPLObSUYlkri1g7ZpZDGau6zGI3PJWxjKHV+3gqv6NSsXxX8KkqoxWrXFq98R7rkaYVq6jVaxWMpScWK6vVPW9rqKnF2r5e71e6G6G5+vRifZ9zjHFwyZDM9acYayx7PHEOeWIZ4pI5ViGxatW16/UFYlUfsy/HiFUx7iC3oxCrZDx73oc8sQrRarUNeWLlrKepx5AnVqbZaq0lHytmd3/tVu8jqccK2VuMjfA65NVjLdf3mBvhKYjHStuaWTU2wkst6Vj71+64MBiTjXV+7cL2dmK1XJdS+W9i5bI2qfoJsYpXy1rDEa8aq7ymitYPibWqr6nWIT+spRjL+sJNbYmCsexR3n5FOpYdYmZL1IvVmkxrif6WKBerPcXHW6JarN7SGW6JYrH6Q2m0JYrF6rYabolasQatRluiVKzJG5rmXFOKNXhyvOpuiUKxJh4rLP0tUSfW3JPj7ddm1GNNtuptiTKxxsN9194SVWLNDPesifUBkVhzw33X2hI1Ys0O911jS9SI5WzVukuUiDU/3A/vj1XrUSHWjVb2/44JxPJshEWYl/GzJzpieYf7ztgSHx/rbitrS3x8rDsDa7MeJ+0UYn2K9i+zOT09Fn8ueNbCH6Ked3+utxGLWMQCAAAAAAAAAAAAAAAAAAAAAAD4//0BUyATTom0AxcAAAAASUVORK5CYII=" class="card-img-top" alt="...">
                <label for="file" style="position: absolute;bottom: 10px;right: 10px;cursor: pointer;" class="mb-0"><icon class="fa fa-plus-circle fa-2x text-danger"></icon></label>
                <input type="file" id="file" style="width: 0;height: 0;position: absolute">
            </div>
            <div class="card-body pl-0 pr-0">
                <div class="form-group">
                    <input type="text" class="form-control " id="name_file" placeholder="Tên file">
                </div>
                <div>
                    <input type="text" class="form-control mt-4 mb-2" id="result" placeholder="URL" readonly>
                    <span style="cursor: pointer" class="mt-2"><icon class="fa fa-2x fa-copy text-primary"></icon></span>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button id="submit"  type="button" class="btn btn-success"><icon class="fa fa-plus"></icon>Thêm</button>
        </div>
    </div>

@endsection

@section('script')
    <script>
        let file = null
        let name = ""
        document.addEventListener("DOMContentLoaded",function (){
            $(this).on('change','#file',function (){
                file = document.getElementById('file').files[0]
                name = convertToSlug(file.name)
                $("#name_file").val(name)
                loadFile(file)
            })

            var loadFile = function(file) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(file);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
            };

            $(this).on("click",'#submit',function (){
                if(file===null || name==="") return
                const _this = $(this)
                // $(this).attr('disabled',true)
                upload(function (res){
                    _this.attr('disabled',false)
                    $("#result").val(res.data.url)
                })
            })

            function upload(callback)
            {
                let formData = new FormData();
                formData.append('name',name)
                formData.append('file',file)
                $.ajax({
                    url:"{{route('api.attachments.post')}}",
                    type:"POST",
                    dataType:"JSON",
                    cache: false,
                    contentType: false,
                    processData: false,
                    headers:{
                        Authorization:"Bearer "+window.localStorage.getItem('token')
                    },
                    data:formData,
                    success:function (res){
                        console.log(res)
                        return callback(res);
                    }
                })
            }
        })


    </script>
@endsection

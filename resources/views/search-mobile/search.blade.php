@extends('layouts.app')
@section('content')
    <h3 class="text-white">Số điện thoại: {{$mobile}}</h3>
    <div class="card">
        <div class="info text-black border-black card-body">
            @foreach($texts as $text)
            <p>{{$text}}</p>
            @endforeach
        </div>
    </div>
    <div class="m-4 text-center">
        <button data-value="vote_positive" type="button" class="text-white btn btn-success _vote "><span class="text-white">✔</span> Tích cực</button>
        <button data-value="vote_negative" type="button" class="text-white btn btn-danger _vote "><span class="text-white">✖</span> Tiêu cực</button>
    </div>
    <h3 class="text-white mt-4">Góp ý mới nhất:</h3>
    <table class="table">
        <tbody class="text-white">
        @foreach($comments as $comment)
            <tr>
                <td>{{$comment['time']}}</td>
                <td>{{$comment['comment']}}</td>
            </tr>
        @endforeach
        </tbody>


    </table>
@endsection
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded",function (){
            $(this).on('click','._vote',function (){
                let c = confirm('Are you ready ?')
                let data = $(this).data('value');
                if(!c) return;
                request('{{route('api.search.mobile.vote')}}','POST',{
                    type:data,
                    mobile:'{{$mobile}}'
                })
                $("._vote").attr('disabled',true)
            })

            async function init(){
                let requestData = await request('{{route('api.search.store')}}','POST',{
                    text:'{{implode(' ',$texts)}}',
                    mobile:'{{$mobile}}'
                })
                console.log(requestData);
            }

            init();
        })
    </script>
@endsection

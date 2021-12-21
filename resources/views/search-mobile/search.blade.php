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
    <h3>Góp ý mới nhất:</h3>
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
            async function init(){
                let requestData = await request('{{route('api.search.store','__mobile')}}'.replace('__mobile',{{$mobile}}),'POST',{
                    text:'{{implode(' ',$texts)}}',
                    mobile:'{{$mobile}}'
                })
                console.log(requestData);
            }

            init();
        })
    </script>
@endsection

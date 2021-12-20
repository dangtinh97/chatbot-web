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
@endsection

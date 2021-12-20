@extends('layouts.app')
@section('content')
    <div class="mb-4 mt-1">
        <h1 class="text-danger mb-4">Top số điện thoại tiêu cực nhất</h1>
        <div class="d-flex flex-wrap">
            @foreach($badTop as $mobile)
                <div style="min-width: 185px" class="flex-1 border border-white p-2">
                    <a href="{{route('search',$mobile)}}"><h4 class="text-white text-center">{{$mobile}}</h4></a>
                </div>
            @endforeach
        </div>
    </div>
    <hr>
    <div>
        <h1 class="text-info mb-4">Top số điện thoại tra cứu nhiều nhẩt</h1>
        <div class="d-flex flex-wrap">
            @foreach($views as $mobile)
                <div style="min-width: 185px" class="flex-1 border border-white p-2">
                    <a href="{{route('search',$mobile)}}"><h4 class="text-white text-center">{{$mobile}}</h4></a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('admin.layouts.app')
@section('page-heading','Dashboard')
@section('content')
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tổng số người dùng</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total_user">loading...</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Người dùng mới (hôm nay)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="today_new">loading...</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Người dùng truy cập (hôm nay)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="today_use">loading...</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Số log hôm nay (hôm nay)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="log_request_today">loading...</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-firefox-browser fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.addEventListener("DOMContentLoaded",function (){
            let logs = {};
            loading(true)
            request('{{route('api.admin.dashboard.index')}}','GET',{}).then(function (res){

                $("#total_user").html(`${res.data.total_user}`)
                $("#today_new").html(`${res.data.today_new}`)
                $("#today_use").html(`${res.data.today_use}`)
                $("#log_request_today").html(`${res.data.log_request_today}`)
                logs = {

                }
                loading(false)
            })
        })
    </script>
@endsection

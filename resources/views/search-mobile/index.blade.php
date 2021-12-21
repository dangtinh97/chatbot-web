@extends('layouts.app')
@section('content')
    <div class="mb-4 mt-1">
        <h1 class="text-danger mb-4">Top số điện thoại tiêu cực nhất</h1>
        <div class="d-flex flex-wrap border border-white">
            @foreach($badTop as $mobile)
                <div style="min-width: 185px" class="flex-1 p-2">
                    <a href="{{route('search',$mobile)}}"><h4 class="text-white text-center">{{$mobile}}</h4></a>
                </div>
            @endforeach
        </div>
    </div>
    <hr>
    <div>
        <h1 class="text-info mb-4">Top số điện thoại tra cứu nhiều nhất</h1>
        <div class="d-flex flex-wrap border border-white">
            @foreach($views as $mobile)
                <div style="min-width: 185px" class="flex-1  p-2">
                    <a href="{{route('search',$mobile)}}"><h4 class="text-white text-center">{{$mobile}}</h4></a>
                </div>
            @endforeach
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <article class="mt-5 mb-5 pt-4 pb-4 pl-3 pr-3" style="background-color: white;">
                <div style="margin: 20px">
                <h2>Cảnh giác với trò lừa đảo nháy máy</h2>
                <section>
                    <p>Thỉnh thoảng, điện thoại của bạn có thể đổ chuông một lần rồi ngưng ngay. Nếu việc đó xảy ra và bạn không nhận ra số điện thoại, đừng gọi lại cho số đó. Bạn có thể là mục tiêu của một trò lừa đảo gọi điện “nháy máy”.</p>
                    <p>Với những kẻ gọi điện tự động (robocaller) phi pháp, mục đích không phải lúc nào cũng là khiến bạn phải nhấc máy trả lời. Đôi khi, mục đích là để khiến cho bạn gọi lại.</p>
                    <p>Các cuộc gọi nháy máy thường sẽ là số máy bàn nếu ở Việt Nam hoặc đầu số quốc tế, nếu tinh vi thì chúng sẽ dùng đầu số ở Mỹ hoặc không sẽ là đầu số tự do gần giống như vậy để tạo độ uy tín.</p>
                    <p>Nếu không phải là nháy máy thì chúng sẽ xuất hiện dưới dạng tin nhắn hộp thư thoại giả mạo, nhằm hối thúc bạn gọi cho một số có mã khu vực xa lạ để “nhận một phần thưởng” hoặc để thông báo cho bạn biết về một người họ hàng “đang đau ốm” hoặc yêu cầu bạn chuyển khoản để giữ quà…</p>
                    <p>Nếu như bạn gọi lại cho bất kỳ số nào như thế, khả năng cao là bạn sẽ bị tính phí kết nối, ít thì theo chuẩn giá cước của nhà mạng, cao hơn là số dành cho các tổng đài dịch vụ. Những khoản phí này có thể xuất hiện trên hóa đơn dưới dạng các dịch vụ trả thêm.</p>
                    <p>Những chiêu trò lừa đảo này tuy cũ nhưng vẫn có nhiều người bị lừa, đặc biệt là vào dịp cuối năm. Vì vậy bạn nên tỉnh táo với những cuộc gọi từ số lạ hay những cuộc gọi thông báo trúng thưởng, tuyệt đối không gọi lại hoặc chuyển khoản cho những đầu số lạ.</p>
                </section>
                <section>
                    <h3>Cách tránh trò lừa đảo nháy máy</h3>
                    <p>Đừng trả lời hay gọi lại cho bất kỳ cuộc gọi nào đến từ các số mà bạn không nhận ra, đặc biệt là số máy bàn.</p>
                    <p>Trước khi gọi cho các số xa lạ, hãy kiểm tra xem mã khu vực có phải là ra quốc tế không.</p>
                    <p>Nếu bạn không thực hiện các cuộc gọi quốc tế, thì hãy nhờ công ty điện thoại hoặc nhà mạng đang sử dụng khóa hướng cuộc gọi ra quốc tế.</p>
                    <p>Hãy luôn thận trọng, kể cả khi một số điện thoại có vẻ như là thật.</p>
                </section>
                </div>
            </article>

        </div>
    </div>

@endsection

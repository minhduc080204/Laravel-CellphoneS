@extends('layouts.cart')
@section('title', 'Giao hàng')
@section('addlink')
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        nav > .nav.nav-tabs{
            border: none;
            color:#fff;
            background:#272e38;
            border-radius:0;
    
        }
        nav > div a.nav-item.nav-link,
        nav > div a.nav-item.nav-link.active
        {
            border: none;
            padding: 18px 25px;
            color:#fff;
            background:#272e38;
            border-radius:0;
        }
    
        nav > div a.nav-item.nav-link.active:after
        {
            content: "";
            position: relative;
            bottom: -60px;
            left: -10%;
            border: 15px solid transparent;
            border-top-color: #e74c3c ;
        }
            .tab-content{
            background: #fdfdfd;
            line-height: 25px;
            border: 1px solid #ddd;
            border-top:5px solid #e74c3c;
            border-bottom:5px solid #e74c3c;
            padding:30px 25px;
        }
    
        nav > div a.nav-item.nav-link:hover,
        nav > div a.nav-item.nav-link:focus
        {
            border: none;
            background: #e74c3c;
            color:#fff;
            border-radius:0;
            transition:background 0.20s linear;
        }
        .div_cart{
            border: solid rgb(212, 211, 211) 2px;
        }
        .div_cart:hover{
            border: solid red 2px;
        }
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
        .confirm_div {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            z-index: 1000;
        }
    </style>    
@endsection
@section('main')
    <div class="container">
        <div class="row m-1 p-1">
            <div class="col-xs-12 " style="width: 100%;">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Chờ xác nhận</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Đang giao</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Đã giao</a>
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">                    
                    <div class="tab-pane fade show active p-2" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        @foreach ($orders1 as $order)
                        <div class="div_cart m-1" id="div_{{ $order->OrderID }}">
                            @foreach ($order->orderDetails as $item)
                            <div class="row fs-6 border-bottom p-1">
                                <div class="col-3">
                                    <img class="img-fluid" src="{{ asset($item->product->Image) }}" alt="laptop" style="width: 70%; height: auto;">
                                </div>
                                <div class="col-7 p-3">
                                    Tên sản phẩm: <strong>{{ $item->product->Name }}</strong> <br> 
                                    Phiên bản: <strong>{{ $item->version->Version }}</strong> <br> 
                                    Màu sắc: <strong>{{ $item->color->Color }}</strong> <br> 
                                    Giá tiền: <strong class="price fs-5 p-2">{{ $item->product->Price }}</strong>
                                </div>
                                <div class="col-2 p-3">Số lượng: {{ $item->Quantity }}</div>
                            </div>    
                            @endforeach
                            <div class="d-flex justify-content-between">
                                <div class="p-2">
                                    Ngày đặt: <strong>{{ $order->OrderDate }}</strong>
                                </div>
                                <div class="d-flex flex-row-reverse fs-5">
                                    <div class="p-2">Thành tiền: <strong class="price">{{ $order->Price }}</strong></div>
                                    <div class="p-2">Số lượng: <strong>{{ $order->Quantity }}</strong></div>
                                </div>
                            </div>
                            <div class="d-flex flex-row-reverse">
                                <div class="p-2"><button type="button" class="btn btn-danger" onclick="confirm({{ $order->OrderID }})">
                                    Hủy đơn</button></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade p-2" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        @foreach ($orders2 as $order)
                        <div class="div_cart m-1" id="divdeli_{{ $order->OrderID }}">
                            @foreach ($order->orderDetails as $item)
                            <div class="row fs-6 border-bottom p-1">
                                <div class="col-3">
                                    <img class="img-fluid" src="{{ asset($item->product->Image) }}" alt="laptop" style="width: 70%; height: auto;">
                                </div>
                                <div class="col-7 p-3">
                                    Tên sản phẩm: <strong>{{ $item->product->Name }}</strong> <br> 
                                    Phiên bản: <strong>{{ $item->version->Version }}</strong> <br> 
                                    Màu sắc: <strong>{{ $item->color->Color }}</strong> <br> 
                                    Giá tiền: <strong class="price fs-5 p-2">{{ $item->product->Price }}</strong>
                                </div>
                                <div class="col-2 p-3">Số lượng: {{ $item->Quantity }}</div>
                            </div>    
                            @endforeach
                            <div class="d-flex justify-content-between">
                                <div class="p-2">
                                    Ngày đặt: <strong>{{ $order->OrderDate }}</strong>
                                </div>
                                <div class="d-flex flex-row-reverse fs-5">
                                    <div class="p-2">Thành tiền: <strong class="price">{{ $order->Price }}</strong></div>
                                    <div class="p-2">Số lượng: <strong>{{ $order->Quantity }}</strong></div>
                                </div>
                            </div>
                            <div class="d-flex flex-row-reverse">                                
                                <div class="p-2">
                                    <button type="button" class="btn btn-secondary" title="Không thể hủy" onclick="decancel()">
                                        Hủy đơn
                                    </button>
                                </div>
                                <div class="p-2 me-3"><button type="button" class="btn btn-success" onclick="confirm2({{ $order->OrderID }})">
                                    Đã nhận được hàng !</button></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade p-2" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        @foreach ($orders3 as $order)
                        <div class="div_cart m-1">
                            @foreach ($order->orderDetails as $item)
                            <div class="row fs-6 border-bottom p-1">
                                <div class="col-3">
                                    <img class="img-fluid" src="{{ asset($item->product->Image) }}" alt="laptop" style="width: 70%; height: auto;">
                                </div>
                                <div class="col-7 p-3">
                                    Tên sản phẩm: <strong>{{ $item->product->Name }}</strong> <br> 
                                    Phiên bản: <strong>{{ $item->version->Version }}</strong> <br> 
                                    Màu sắc: <strong>{{ $item->color->Color }}</strong> <br> 
                                    Giá tiền: <strong class="price fs-5 p-2">{{ $item->product->Price }}</strong>
                                </div>
                                <div class="col-2 p-3">Số lượng: {{ $item->Quantity }}</div>
                            </div>    
                            @endforeach
                            <div class="d-flex justify-content-between">
                                <div class="p-2">
                                    Ngày đặt: <strong>{{ $order->OrderDate }}</strong>
                                </div>
                                <div class="d-flex flex-row-reverse fs-5">
                                    <div class="p-2">Thành tiền: <strong class="price">{{ $order->Price }}</strong></div>
                                    <div class="p-2">Số lượng: <strong>{{ $order->Quantity }}</strong></div>
                                </div>
                            </div>
                            <div class="d-flex flex-row-reverse">
                                {{-- <div class="p-2"><button type="button" class="btn btn-danger">Hủy đơn</button></div> --}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- window --}}
    <div class="overlay" id="overlay"></div>
    <div class="alert alert-danger fixed-top fs-5" id="decancel" role="alert" 
        style="width: 26%; margin-left : 38%; margin-top: 5%; display: none">
        <center><strong>Không thể hủy vào lúc này ! <br> Vui lòng liên hệ: 0359100154</strong></center>
    </div>
    <div class="confirm_div border-danger rounded-3 fs-5" id="confirm">
        <strong><p>Bạn có chắc chắn muốn hủy đơn hàng ?</p></strong>
        <div class="d-flex justify-content-around">
          <button type="button" class="btn btn-success" onclick="unorder()">Xác nhận</button>
          <button type="button" class="btn btn-danger" onclick="cancel()">Hủy</button>
        </div>
    </div>
    <div class="confirm_div border-danger rounded-3 fs-5" id="confirm2">
        <strong><p>Bạn có chắc chắn muốn <strong class="text-danger">xác nhận đã nhận</strong> đơn hàng ?</p></strong>
        <div class="d-flex justify-content-around">
          <button type="button" class="btn btn-success" onclick="okdeliver()">Xác nhận</button>
          <button type="button" class="btn btn-danger" onclick="cancel()">Hủy</button>
        </div>
    </div>
    <div class="alert alert-success fixed-top fs-5" id="unorder" role="alert" 
        style="width: 26%; margin-left : 38%; margin-top: 5%; display: none">
        <center><strong>Hủy đơn hàng thành công !</strong></center>
    </div>
    <div class="alert alert-success fixed-top fs-5" id="okdeliver" role="alert" 
        style="width: 26%; margin-left : 38%; margin-top: 5%; display: none">
        <center><strong>Xác nhận thành công !</strong></center>
    </div>
  <script>
    let id;
        function confirm($id){
            document.getElementById("confirm").style.display = "block";
            document.getElementById("overlay").style.display = "block";
            id=$id;
            
        }
        function confirm2($id){
            document.getElementById("confirm2").style.display = "block";
            document.getElementById("overlay").style.display = "block";
            id=$id;
        }
        function cancel(){
            document.getElementById("confirm2").style.display = "none";
            document.getElementById("confirm").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }
        function unorder(){
            $.ajax({
                url: "{{ route('unorder') }}",
                type: 'DELETE',
                data: { 
                    _token: '{{ csrf_token() }}',
                    OrderID: id,
                },
                success: function (data) {
                    done_unorder();
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        }
        function okdeliver(){
            $.ajax({
                url: "{{ route('okdeliver') }}",
                type: 'POST',
                data: { 
                    _token: '{{ csrf_token() }}',
                    OrderID: id,
                },
                success: function (data) {
                    done_deliver();
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        }
        function decancel(){
            document.getElementById('decancel').style.display='block';
            setTimeout(function() {
                document.getElementById('decancel').style.display='none';
            }, 3000);
        }
        function done_unorder(){
            document.getElementById('div_'+id).remove();
            cancel();
            document.getElementById('unorder').style.display='block';
            setTimeout(function() {
                document.getElementById('unorder').style.display='none';
            }, 3000);
        }
        function done_deliver(){
            document.getElementById('divdeli_'+id).remove();
            cancel();
            document.getElementById('okdeliver').style.display='block';
            setTimeout(function() {
                document.getElementById('okdeliver').style.display='none';
            }, 3000);
        }
  </script>
@endsection
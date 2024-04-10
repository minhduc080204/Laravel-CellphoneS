@extends('admin.layouts.home')
@section('title', 'Xác nhận đơn hàng')
@section('addlink')
    <style>        
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
    <h2 class="mb-4 border-bottom border-3 border-danger">Đơn hàng đang chờ xác nhận</h2>
    <div class="tab-pane fade show active p-2" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        @foreach ($orders as $order)
        <div class="div_cart m-1" id="div_{{ $order->OrderID }}">
            <div class="row">                
                <div class="col-8">
                    @foreach ($order->orderDetails as $item)
                    <div class="row fs-6 p-1">
                        <div class="col-3">
                            <img class="img-fluid" src="{{ asset($item->product->Image) }}" alt="laptop">
                        </div>
                        <div class="col-7 p-3">
                            Tên sản phẩm: <strong>{{ $item->product->Name }}</strong> <br> 
                            Phiên bản: <strong>{{ $item->version->Version }}</strong> <br> 
                            Màu sắc: <strong>{{ $item->color->Color }}</strong> <br> 
                            Giá tiền: <strong class="price fs-5 p-2">{{ $item->product->Price }}</strong> <br><br>
                            Số lượng: {{ $item->Quantity }}
                        </div>
                    </div>    
                    @endforeach
                </div>                
                <div class="col p-2 pr-5">
                    <div class="row">
                        Tên: {{ $order->customer->Name }}
                    </div>
                    <div class="row">
                        Liên lạc: {{ $order->customer->Contact }}
                    </div>
                    <div class="row">
                        Email: {{ $order->customer->Email }}
                    </div>
                    <div class="row">
                        Địa chỉ: {{ $order->customer->Address }}
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <div class="p-3">
                    Ngày đặt: <strong>{{ $order->OrderDate }}</strong>
                </div>
                <div class="d-flex flex-row-reverse fs-5">
                    <div class="p-2">Thành tiền: <strong class="price">{{ $order->Price }}</strong></div>
                    <div class="p-2">Số lượng: <strong>{{ $order->Quantity }}</strong></div>
                </div>
            </div>
            <div class="d-flex flex-row-reverse">
                <div class="p-2"><button type="button" class="btn btn-danger" onclick="confirm1({{ $order->OrderID }})">
                    Hủy đơn</button></div>
                <div class="p-2"><button type="button" class="btn btn-success" onclick="confirm2({{ $order->OrderID }})">
                    Xác nhận</button></div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="overlay" id="overlay"></div>
    <div class="confirm_div border-danger rounded-3 fs-5" id="confirm1">
        <strong><p>Bạn có chắc chắn muốn <strong class="text-danger">hủy</strong> đơn hàng ?</p></strong>
        <div class="d-flex justify-content-around">
          <button type="button" class="btn btn-success" onclick="unorder()">Xác nhận</button>
          <button type="button" class="btn btn-danger" onclick="cancel()">Hủy</button>
        </div>
    </div>
    <div class="confirm_div border-danger rounded-3 fs-5" id="confirm2">
        <strong><p>Bạn có chắc chắn muốn <strong class="text-danger">xác nhận</strong> đơn hàng ?</p></strong>
        <div class="d-flex justify-content-around">
          <button type="button" class="btn btn-success" onclick="okorder()">Xác nhận</button>
          <button type="button" class="btn btn-danger" onclick="cancel()">Hủy</button>
        </div>
    </div>
    <div class="alert alert-success fixed-top fs-5" id="unorder" role="alert" 
        style="width: 26%; margin-left : 38%; margin-top: 5%; display: none">
        <center><strong>Hủy đơn hàng thành công !</strong></center>
    </div>
    <div class="alert alert-success fixed-top fs-5" id="okorder" role="alert" 
        style="width: 26%; margin-left : 38%; margin-top: 5%; display: none">
        <center><strong>Xác nhận đơn hàng thành công !</strong></center>
    </div>
  <script>
    let id;
        function confirm1($id){
            document.getElementById("confirm1").style.display = "block";
            document.getElementById("overlay").style.display = "block";
            id=$id;
        }
        function confirm2($id){
            document.getElementById("confirm2").style.display = "block";
            document.getElementById("overlay").style.display = "block";
            id=$id;
        }
        function cancel(){
            document.getElementById("confirm1").style.display = "none";
            document.getElementById("confirm2").style.display = "none";
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
        function okorder(){
            $.ajax({
                url: "{{ route('okorder') }}",
                type: 'POST',
                data: { 
                    _token: '{{ csrf_token() }}',
                    OrderID: id,
                },
                success: function (data) {
                    done_okorder();
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
        function done_okorder(){
            document.getElementById('div_'+id).remove();
            cancel();
            document.getElementById('okorder').style.display='block';
            setTimeout(function() {
                document.getElementById('okorder').style.display='none';
            }, 3000);
        }
  </script>
@endsection
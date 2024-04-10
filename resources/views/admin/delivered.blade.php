@extends('admin.layouts.home')
@section('title', 'Đã giao')
@section('main')
    <h2 class="mb-4 border-bottom border-3 border-danger">Đơn hàng đã giao</h2>
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
        </div>
        @endforeach
    </div>
@endsection
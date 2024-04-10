@extends('admin.layouts.home')
@section('title', 'S-Admin')
@section('main')
  <h2 class="mb-4 border-bottom border-3 border-danger">Trang chủ</h2>
  <div class="row">
    <div class="col shadow p-3 border-start border-5 border-danger rounded ps-4 mx-4 fs-5">
      <a href="{{ route('accept.route') }}">
        <div class="row">
          <div class="col">
            <div><strong class="text-danger">Đơn hàng mới</strong></div>
            <div>{{ $accept }}</div>                  
          </div>
          <div class="col text-end">
            <i class="fa-solid fa-hourglass-half text-danger"></i>
            <div>xem ngay -></div>
          </div>
        </div>
      </a>
    </div>
    <div class="col shadow p-3 border-start border-5 border-primary rounded ps-4 mx-4 fs-5">
      <a href="{{ route('shipping.route') }}">
        <div class="row">
          <div class="col">
            <div><strong class="text-primary">Đơn đang giao</strong></div>
            <div>{{ $shipping }}</div>                 
          </div>
          <div class="col text-end">
            <i class="fa-solid fa-truck-fast text-primary"></i>
            <div>xem ngay -></div>
          </div>
        </div>
      </a>
    </div>
    <div class="col shadow p-3 border-start border-5 border-success rounded ps-4 mx-4 fs-5">
      <a href="{{ route('delivered.route') }}">
        <div class="row">
          <div class="col">
            <div><strong class="text-success">Đơn đã giao</strong></div>
            <div>{{ $delivered }}</div>              
          </div>
          <div class="col text-end">
            <i class="fa-solid fa-hand-holding-dollar text-success"></i>
            <div>xem ngay -></div>
          </div>
        </div>
      </a>
    </div>
  </div>
  <div class="row border rounded-2 p-3 m-3 shadow">
    <div>
      <div class="d-flex justify-content-between">
        <h5 class="border-bottom m-2">Doanh thu: <strong class="price">{{ $revenue }}</strong></h5>
        <h5 class="border-bottom m-2">Mục tiêu: <strong class="price">1000000000</strong></h5>
      </div>
      <div class="progress" role="progressbar" aria-label="Success striped example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 20px;">
        <div class="progress-bar progress-bar-striped bg-success fs-6" style="width: {{ $revenue/10000000 }}%">{{ $revenue/10000000 }}%</div>
      </div>
    </div>
  </div>
  <div class="row border rounded-2 p-3 m-3 shadow">
    <div>
      <h5 class="border-bottom m-2">Số lượng sản phẩm: {{ $numP+$numL }}</h5>
      <div class="progress-stacked" style="height: 30px;">
        <div class="progress" role="progressbar" aria-label="Segment one" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: {{ $numL*100/($numP+$numL) }}%; height: 100%;">
          <div class="progress-bar bg-info fs-6">Laptop: {{ $numL }}</div>
        </div>
        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: {{ $numP*100/($numP+$numL) }}%; height: 100%;">
          <div class="progress-bar bg-warning fs-6">Điện thoại: {{ $numP }}</div>
        </div>
      </div>
    </div>
  </div>
@endsection
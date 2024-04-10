@extends('layouts.show')
@section('title', $product->Name)

@section('product_name')
    <div class="col-md-auto pt-1">
        <h4>{{ $product->Name }}</h4>
    </div>
    <div class="col-md">
        <div class="mt-1 text-danger">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
    </div>
@endsection

@section('casousel_main')        
    <div class="carousel-item active" style="width: 100%;">
        <div style="margin-left: 22%; width: 55%;">
            <img src="{{ asset($product->Image) }}" class="img-fluid d-block w-100" alt="...">
        </div>
    </div>
    @foreach ($product->images as $item)
    <div class="carousel-item" style="width: 100%;">
        <div style="margin-left: 22%; width: 55%;">
            <img src="{{ asset($item->Images) }}" class="img-fluid d-block w-100" alt="...">
        </div>    
    </div>
    @endforeach
@endsection

@section('comment')
    <div class="row mt-3 shadow-sm p-2">
        <h6>Đánh giá & nhận xét {{ $product->Name }}</h6>
        <div class="col-md-4 border-end">
            <center>
                <h5><strong>4.0/5</strong></h5>
                <div>
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                10 đánh giá
            </center>
            
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-1">5</div>
                <div class="col-1"><i class="fa-solid fa-star text-warning"></i></div>
                <div class="col-6 pt-1">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-danger" style="width: 40%"></div>
                    </div>
                </div>
                <div class="col-4">4 đánh giá</div>
            </div>
            <div class="row">
                <div class="col-1">4</div>
                <div class="col-1"><i class="fa-solid fa-star text-warning"></i></div>
                <div class="col-6 pt-1">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-danger" style="width: 30%"></div>
                    </div>
                </div>
                <div class="col-4">3 đánh giá</div>
            </div>
            <div class="row">
                <div class="col-1">3</div>
                <div class="col-1"><i class="fa-solid fa-star text-warning"></i></div>
                <div class="col-6 pt-1">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-danger" style="width: 30%"></div>
                    </div>
                </div>
                <div class="col-4">3 đánh giá</div>
            </div>
            <div class="row">
                <div class="col-1">2</div>
                <div class="col-1"><i class="fa-solid fa-star text-warning"></i></div>
                <div class="col-6 pt-1">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-danger" style="width: 0%"></div>
                    </div>
                </div>
                <div class="col-4">0 đánh giá</div>
            </div>
            <div class="row">
                <div class="col-1">1</div>
                <div class="col-1"><i class="fa-solid fa-star text-warning"></i></div>
                <div class="col-6 pt-1">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-danger" style="width: 0%"></div>
                    </div>
                </div>
                <div class="col-4">0 đánh giá</div>
            </div>
        </div>
    </div>
@endsection

@section('version')
@php $up=0 @endphp
    @foreach ($product->versions as $item)
        <label class="COLOR col-md-3 col-sm-4 border rounded-2 border-2 m-2">
            <input class="input_version" type="radio" name="version" value="{{ $item->VersionID }}" checked="checked"/>
            <div class="row pt-1">
                <center><strong>{{ $item->Version }}</strong> <br> <strong class="price">{{ $product->Price+$up }}</strong></center>
            </div>
        </label>
        @php $up+=1500000 @endphp
    @endforeach
@endsection

@section('color')
    @foreach ($product->colors as $item)
        <label class="COLOR col-lg-3 col-md-5 col-4 border rounded-2 border-2 m-2">
            <input class="input_color" type="radio" name="radioname" value="{{ $item->ColorID }}" checked="checked"/>
            <div class="row">
                <div class="col-5">
                    <img class="img-fluid" src="{{ asset('images/laptops/laptop-asus-tuf-gaming-f15-fx506hf-hn014w.webp') }}" alt="product">
                </div>
                <div class="col-7 pt-1 ps-0">
                    <center><strong>{{ $item->Color }}</strong></center>
                </div>
            </div>
        </label>
    @endforeach
    <style>
        .COLOR {
            /* width: 10%; */
        }
        .COLOR > input{ /* HIDE RADIO */
            visibility: hidden; /* Makes input not-clickable */
            position: absolute; /* Remove input from document flow */
        }
        .COLOR > input + div{ /* DIV STYLES */
            cursor:pointer;
            border:2px solid transparent;
        }
        .COLOR > input:checked + div{ /* (RADIO CHECKED) DIV STYLES */
            background-color: #ffd6bb;
            border: 1px solid #ff6600;
        }
    </style>
@endsection

@section('description')
    @php
        $des=explode("..", $product->Description);
    @endphp
    <ul>
        @foreach ($des as $item)
            @if ($item)
                <li>{{ $item }}</li>        
            @endif
        @endforeach        
    </ul>
@endsection
    
@section('detail')
    <p>{{ $product->Detail }}</p>    
@endsection

@section('thongso')
    {{-- phone//laptop --}}
    @if ($product->Type==1)
        <div class="row p-1 bg-body-secondary">
            <div class="col-6">Công nghệ màn hình</div>
            <div class="col-6">{{ $product->phone->Screen }}</div>
        </div>
        <div class="row p-1">
            <div class="col-6">Camera sau</div>
            <div class="col-6">{{ $product->phone->Cameraat }}</div>
        </div>
        <div class="row p-1 bg-body-secondary">
            <div class="col-6">Camera trước</div>
            <div class="col-6">{{ $product->phone->Camerabf }}</div>
        </div>
        <div class="row p-1">
            <div class="col-6">CPU</div>
            <div class="col-6">{{ $product->phone->Cpu }}</div>
        </div>
        <div class="row p-1 bg-body-secondary">
            <div class="col-6">Dung lượng RAM</div>
            <div class="col-6">{{ $product->phone->Ram }}</div>
        </div>
        <div class="row p-1">
            <div class="col-6">Bộ nhớ</div>
            <div class="col-6">{{ $product->phone->Ssd }}</div>
        </div>
        <div class="row p-1 bg-body-secondary">
            <div class="col-6">Dung lượng Pin</div>
            <div class="col-6">{{ $product->phone->Pin }}</div>
        </div>
        <div class="row p-1">
            <div class="col-6">Hệ điều hành</div>
            <div class="col-6">{{ $product->phone->Os }}</div>
        </div>
        <div class="row p-1 bg-body-secondary">
            <div class="col-6">Chất liệu</div>
            <div class="col-6">{{ $product->phone->Material }}</div>
        </div>
        <div class="row p-1">
            <div class="col-6">Trọng lượng</div>
            <div class="col-6">{{ $product->phone->Weight }}</div>
        </div>
    @else
        <div class="row p-1 bg-body-secondary">
            <div class="col-6">CPU</div>
            <div class="col-6">{{ $product->laptop->Cpu }}</div>
        </div>
        <div class="row p-1">
            <div class="col-6">GPU</div>
            <div class="col-6">{{ $product->laptop->Gpu }}</div>
        </div>
        <div class="row p-1 bg-body-secondary">
            <div class="col-6">Dung lượng RAM</div>
            <div class="col-6">{{ $product->laptop->Ram }}</div>
        </div>
        <div class="row p-1">
            <div class="col-6">Dung lượng bộ nhớ</div>
            <div class="col-6">{{ $product->laptop->Ssd }}</div>
        </div>
        <div class="row p-1 bg-body-secondary">
            <div class="col-6">Màn hình</div>
            <div class="col-6">{{ $product->laptop->Screen }}</div>
        </div>
        <div class="row p-1">
            <div class="col-6">Dung lượng Pin</div>
            <div class="col-6">{{ $product->laptop->Pin }}</div>
        </div>
        <div class="row p-1 bg-body-secondary">
            <div class="col-6">Hệ điều hành</div>
            <div class="col-6">{{ $product->laptop->Os }}</div>
        </div>
        <div class="row p-1">
            <div class="col-6">Chất liệu</div>
            <div class="col-6">{{ $product->laptop->Material }}</div>
        </div>
        <div class="row p-1 bg-body-secondary">
            <div class="col-6">Trọng lượng</div>
            <div class="col-6">{{ $product->laptop->Weight }}</div>
        </div>
    @endif  
    {{-- thong tin chung   --}}
    <div class="row p-1">
        <div class="col-6">Thời gian bảo hành</div>
        <div class="col-6">{{ $product->Warranty }}</div>
    </div>
@endsection
@extends('layouts.home')

@section('addcss')
    <style>
        @media (max-width: 767px) {
            #carousel2 .carousel-inner .carousel-item > div {
                display: none;
            }
            #carousel2 .carousel-inner .carousel-item > div:first-child {
                display: block;
            }
        }
        #carousel2 .carousel-inner .carousel-item.active,
        #carousel2 .carousel-inner .carousel-item-next,
        #carousel2 .carousel-inner .carousel-item-prev {
            display: flex;
        }
        /* medium and up screens */
        @media (min-width: 768px) {
            #carousel2 .carousel-inner .carousel-item-end.active,
            #carousel2 .carousel-inner .carousel-item-next {
                transform: translateX(25%);
            }
            #carousel2 .carousel-inner .carousel-item-start.active, 
            #carousel2 .carousel-inner .carousel-item-prev {
                transform: translateX(-25%);
            }
        }
        #carousel2 .carousel-inner .carousel-item-end,
        #carousel2 .carousel-inner .carousel-item-start { 
            transform: translateX(0);
        }
    </style>
@endsection

@section('main')
    <div class="container">
        {{-- name of product --}}
        <div class="row border-bottom mb-2">
            @yield('product_name')
        </div>
        {{-- main display --}}
        <div class="row">
            <div class="col-md-7">
                <div class="rounded">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner border rounded-4 text-center">
                        @yield('casousel_main')
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                </div>
                </div>
                
                @yield('comment')
            </div>

            <div class="col-md-5 col-sm-10">
                <div class="row d-flex justify-content-center h6 mini">
                    @yield('version')                    
                </div>
                <h5>Chọn màu để xem đánh giá</h5>
                <div class="row d-flex justify-content-center">
                    @yield('color')
                </div> 
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col border border-3 rounded-2 border-danger m-1 p-2">
                        <center><h4><strong class="price">{{ $product->Price }}</strong></h4></center>
                    </div>
                    <div class="col-3"></div>
                </div>    
                <div class="row border rounded-2 border-danger-subtle m-2">
                    <div class="row text-danger fs-5 p-2">
                        <div class="col-1"><i class="img-fluid fa-solid fa-gift"></i></div>
                        <div class="col-10"><strong>Khuyến mãi</strong></div>
                    </div>
                    <div class="row">
                        <ul type="none">
                            <li>Tặng bảo hành Premium (Xem chi tiết)</li>
                            <li>Nhận giảm giá hoặc Tặng Sim Data 4G Vietnamobile King Plus 20GB/Ngày - Miễn phí 12 tháng trị giá 1.090.000đ (Xem chi tiết)</li>
                        </ul>
                    </div>
                </div>             
                <div class="row">
                    <div class="col-lg-8 col-md-12 bg-danger border rounded-2 text-white p-2 m-2">
                        <a type="button" id="buyNow" class="text-white ms-3">
                            <center><strong>MUA NGAY</strong> <br> Giao nhanh từ 2 giờ hoặc nhận tại cửa hàng</center>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-12 p-2 border rounded-2 m-2">
                        <a type="button" class="text-danger ps-2" id="addCart">
                            <div class="row ">
                                <center><i class="fa-solid fa-cart-plus"></i></center>
                            </div>
                            <div class="row">
                                <center>Thêm vào giỏ</center>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-12 bg-primary border rounded-2 text-white p-2 m-2">
                        <center><strong>Trả góp 0%</strong> <br> trả trước từ </center>
                    </div>
                    <div class="col-lg-6 col-md-12 bg-primary border rounded-2 text-white p-2 m-2">
                        <center><strong>Trả góp qua thẻ</strong> <br> trả trước từ </center>
                    </div>
                </div>
            </div>
        </div>
        {{-- information of product --}}
        <div class="row p-1 m-3">
            <div class="col-lg-7 p-2 shadow ms-2 me-4 border rounded-2">
                <div class="bg-secondary-subtle border rounded-2 p-2 my-2">
                    <center><h5 class="text-danger">ĐẶC ĐIỂM NỔI BẬT</h5></center>
                    @yield('description')
                </div>
                <div>
                    @yield('detail')
                </div>
            </div>
            <div class="col-lg-4 p-3 shadow border rounded-2">
                <h5 class="mb-2 text-danger">Thông số kỹ thuật</h5>
                <div class="table px-3">
                    @yield('thongso')
                </div>
            </div>
        </div>
        {{-- comment --}}
        <section>
            <div class="row d-flex justify-content-center">
              <div class="col-md-10 col-lg-10 col-xl-9">
                <div class="card">
                  <div class="card-body p-4 shadow-sm">
                    <div class="d-flex flex-start w-100">
                      <img class="rounded-circle shadow-1-strong me-3"
                        src="https://inkythuatso.com/uploads/thumbnails/800/2023/03/8-anh-dai-dien-trang-inkythuatso-03-15-26-54.jpg" alt="avatar" width="65"
                        height="65" />
                      <div class="w-100">
                        <h5>Thêm bình luận</h5>
                        <div class="form-outline">
                          <textarea class="form-control" id="comment" rows="4" placeholder="Nhập bình luận" name="comment" required></textarea>
                        </div>
                        <div class="d-flex  justify-content-end mt-3">
                          <button type="button" class="btn btn-success" id="comment-btn">
                            Bình luận <i class="fas fa-long-arrow-alt-right ms-1"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-10 col-xl-8 m-2" id="comment_contain">
                <div class="d-flex justify-content-between align-items-center mb-2 border-bottom border-3">
                  <h4 class="text-dark mb-0">Bình luận về sản phẩm</h4>
                </div>
                @foreach ($comments as $comment)
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex flex-start">
                      <img class="rounded-circle shadow-1-strong me-3"
                        src="https://inkythuatso.com/uploads/thumbnails/800/2023/03/8-anh-dai-dien-trang-inkythuatso-03-15-26-54.jpg" alt="avatar" width="40"
                        height="40" />
                      <div class="w-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                          <h6 class="text-primary fw-bold mb-0">
                            {{ $comment->user->name }}
                            <span class="text-dark ms-2">{{ $comment->Comment }}</span>
                          </h6>
                          <p class="mb-0">{{ $comment->Date }}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                          <p class="small mb-0" style="color: #aaa;">
                            <a href="#!" class="link-grey">Remove</a> •
                            <a href="#!" class="link-grey">Reply</a> •
                            <a href="#!" class="link-grey">Translate</a>
                          </p>
                          <div class="d-flex flex-row">
                            <i class="fas fa-user-plus" style="color: #aaa;"></i>
                            <i class="far fa-star mx-2" style="color: #aaa;"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
        </section>
        {{-- moreproduct --}}
        <div class="row" id="carousel2">
            <h4 class="mt-2">Sản phẩm tương tự</h4>
            <div class="container text-center">
                <div class="row mx-auto my-auto justify-content-center">
                    <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel" style="width: 1250px;">
                        <div class="carousel-inner" role="listbox">
                        @php $count=0 @endphp
                        @foreach ($products as $pro)
                            @if ($count==0)
                            {{ $count++ }}
                            <div class="carousel-item active">                                
                            @else
                            <div class="carousel-item">                                
                            @endif
                            <div class="col-md-3">
                                <a href="{{ route('product.show', $pro->ProductID) }}">
                                    <div class="card" style="border-radius: 15px;">
                                        <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light"
                                        data-mdb-ripple-color="light">
                                        <img src="{{ asset($pro->Image) }}"
                                            style="border-top-left-radius: 15px; border-top-right-radius: 15px;" class="img-fluid"
                                            alt="Laptop" />
                                        <a href="#!">
                                            <div class="mask"></div>
                                        </a>
                                        </div>
                                        <div class="card-body pb-0">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                <p>{{ $pro->Name }}</p>
                                                    <div class="row">
                                                        <div class="col"></div>
                                                        <div class="col">
                                                            <p class="small text-muted fs-5 price">{{ $pro->Price }}</p>
                                                        </div>
                                                        <div class="col">
                                                            <div class="d-flex flex-row justify-content-end mt-1 mb-4 text-danger">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        </div>
                        <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>		
            </div>
            <script type="module">
                let items = document.querySelectorAll('#carousel2 .carousel .carousel-item')
        
                items.forEach((el) => {
                    const minPerSlide = 4
                    let next = el.nextElementSibling
                    for (var i=1; i<minPerSlide; i++) {
                        if (!next) {
                    // wrap carousel by using first child
                    next = items[0]
                }
                    let cloneChild = next.cloneNode(true)
                    el.appendChild(cloneChild.children[0])
                    next = next.nextElementSibling
                    }
                })
            </script>
        </div>   
    </div>
    <div class="alert alert-success fixed-top fs-5" id="alert_comment" role="alert" 
        style="width: 26%; margin-left : 38%; margin-top: 5%; display: none">
        <center><strong>Bình luận thành công !</strong></center>
    </div>
    @auth
    <div class="alert alert-success fixed-top fs-5" id="alert" role="alert" 
        style="width: 26%; margin-left : 38%; margin-top: 5%; display: none">
        <center><strong>Thêm vào giỏ hàng thành công !</strong></center>
    </div>
    @else 
        <div class="alert alert-danger fixed-top fs-5" id="alert1" role="alert" 
            style="width: 26%; margin-left : 38%; margin-top: 5%; display: none">
            <center><strong>Hãy dăng nhập trước !</strong></center>
        </div>       
    @endauth
    
    <script>
        function addcart(){
            document.getElementById('alert').style.display = 'block';
            setTimeout(function() {
                document.getElementById('alert').style.display = 'none';
            }, 4000);
        }
        $('#buyNow').on('click', function(event){
            event.preventDefault();
            var ProductId = '{{ $product->ProductID }}';
            var Numcart= $('#numcart').text();
            var ColorID = $('.input_color:checked').val();
            var VersionID = $('.input_version:checked').val();
            $.ajax({
                url: "{{ route('addToCart') }}",
                type: 'POST',
                data: { 
                    _token: '{{ csrf_token() }}',
                    ProductId: ProductId,
                    Numcart: Numcart,
                    ColorID: ColorID,
                    VersionID: VersionID,
                },
                success: function (data) {
                    window.location.href = '{{ route('cart.route') }}';
                    
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        })
    </script>
    <script>
        $(document).ready(function(){            
            $('#addCart').on('click', function(event){
            @auth        
                event.preventDefault();
                var ProductId = '{{ $product->ProductID }}';
                var Numcart= $('#numcart').text();
                var ColorID = $('.input_color:checked').val();
                var VersionID = $('.input_version:checked').val();
                $.ajax({
                    url: "{{ route('addToCart') }}",
                    type: 'POST',
                    data: { 
                        _token: '{{ csrf_token() }}',
                        ProductId: ProductId,
                        Numcart: Numcart,
                        ColorID: ColorID,
                        VersionID: VersionID,
                    },
                    success: function (data) {
                        $('#numcart').text(data.numcart);
                        addcart();
                    },
                    error: function (error) {
                        console.log('Error:', error);
                    }
                });
            @else
                document.getElementById('alert1').style.display = 'block';
                setTimeout(function() {
                    document.getElementById('alert1').style.display = 'none';
                }, 4000);
            @endauth
            })
            $('#comment-btn').on('click', function(event){
            @auth        
                event.preventDefault();
                var ProductId = '{{ $product->ProductID }}';
                var Comment = document.getElementById('comment').value;
                $.ajax({
                    url: "{{ route('comment') }}",
                    type: 'POST',
                    data: { 
                        _token: '{{ csrf_token() }}',
                        ProductId: ProductId,
                        Comment: Comment,
                    },
                    success: function (data) {
                        var comment=data.newcomment;
                        var stringhtml=`
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex flex-start">
                                    <img class="rounded-circle shadow-1-strong me-3"
                                        src="https://inkythuatso.com/uploads/thumbnails/800/2023/03/8-anh-dai-dien-trang-inkythuatso-03-15-26-54.jpg" alt="avatar" width="40"
                                        height="40" />
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="text-primary fw-bold mb-0">
                                            ${ comment.user.name }
                                            <span class="text-dark ms-2">${ comment.Comment }</span>
                                        </h6>
                                        <p class="mb-0">${ comment.Date }</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                        <p class="small mb-0" style="color: #aaa;">
                                            <a href="#!" class="link-grey">Remove</a> •
                                            <a href="#!" class="link-grey">Reply</a> •
                                            <a href="#!" class="link-grey">Translate</a>
                                        </p>
                                        <div class="d-flex flex-row">
                                            <i class="fas fa-user-plus" style="color: #aaa;"></i>
                                            <i class="far fa-star mx-2" style="color: #aaa;"></i>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        $('#comment_contain').append(stringhtml);
                        document.getElementById('alert_comment').style.display = 'block';
                        setTimeout(function() {
                            document.getElementById('alert_comment').style.display = 'none';
                        }, 4000);
                        document.getElementById('comment').value='';
                    },
                    error: function (error) {
                        console.log('Error:', error);
                    }
                });
            @else
                document.getElementById('alert1').style.display = 'block';
                setTimeout(function() {
                    document.getElementById('alert1').style.display = 'none';
                }, 4000);
            @endauth
            })
        })
    </script>
@endsection


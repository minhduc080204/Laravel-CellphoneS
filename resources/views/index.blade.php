@extends('layouts.home')
@section('title', 'Trang chủ')
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
<section class="menu py-3 mt-2">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <ul class="list-group fs-5">
                    <li class="list-group-item">
                        <a class="my_menu_link" href="{{ route('phone.route') }}">
                        <div class="row">
                            <div class="col-3"><i class="img-fluid fa-solid fa-mobile-screen-button fs-4"></i></div>
                            <div class="col-9"><strong>Điện thoại</strong></div>
                        </div>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a class="my_menu_link" href="#">
                        <div class="row">
                            <div class="col-3"><i class="img-fluid fa-solid fa-tablet-screen-button fs-4"></i></div>
                            <div class="col-9"><strong>Tablet</strong></div>
                        </div>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a class="my_menu_link" href="{{ route('laptop.route') }}">
                        <div class="row">
                            <div class="col-3"><i class="img-fluid fa-solid fa-laptop fs-4"></i></div>
                            <div class="col-9"><strong>Laptop</strong></div>
                        </div>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a class="my_menu_link" href="#">
                        <div class="row">
                            <div class="col-3"><i class="img-fluid fa-regular fa-keyboard fs-4"></i></div>
                            <div class="col-9"><strong>Phụ kiện</strong></div>
                        </div>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a class="my_menu_link" href="#">
                        <div class="row">
                            <div class="col-3"><i class="img-fluid fa-regular fa-thumbs-up fs-4"></i></div>
                            <div class="col-9"><strong>Hàng cũ</strong></div>
                        </div>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a class="my_menu_link" href="#">
                        <div class="row">
                            <div class="col-3"><i class="img-fluid fa-regular fa-calendar-days fs-4"></i></div>
                            <div class="col-9"><strong>Khuyến mãi</strong></div>
                        </div>
                        </a>
                    </li>                        
                    <li class="list-group-item">
                        <a class="my_menu_link" href="#">
                        <div class="row">
                            <div class="col-3"><i class="img-fluid fa-regular fa-newspaper fs-4"></i></div>
                            <div class="col-9"><strong>Tin công nghệ</strong></div>
                        </div>
                        </a>
                    </li>
                  </ul>
            </div>
            <div class="col-8">
              <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="images/slide1.webp" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/slide2.webp" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/slide3.webp" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/slide4.webp" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/slide5.webp" class="d-block w-100" alt="...">
                  </div>
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
            <div class="col-2">
                <div class="row">
                    <div class="col">
                        <a href="#"><img class="img-thumbnail" src="images/baner1.webp" alt="baner" srcset=""></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="#"><img class="img-thumbnail" src="images/baner2.webp" alt="baner" srcset=""></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="#"><img class="img-thumbnail" src="images/baner3.webp" alt="baner" srcset=""></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="#"><img class="img-thumbnail" src="images/baner1.webp" alt="baner" srcset=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="main-content">
  {{-- san pham hot --}}
    <div class="container">
        <div class="row py-2 border rounded">
            <img class="img-fluid" src="images/baner_main1.webp" alt="banner" srcset="">
        </div>    
        <div class="row py-2 border border-primary rounded" style="background-image: url('https://cdn2.cellphones.com.vn/x/media/wysiwyg/fs-bg.png')">
          <div class="row">
            <div class="col-5">
                <img class="img-fluid" src="https://cdn2.cellphones.com.vn/x/media/wysiwyg/hotsale-gia-soc.gif" alt="banner" srcset="">
            </div>
            <div class="col-7">
            </div>
          </div>
          <div class="row" id="carousel2">
            <div class="container text-center ms-3">
              <div class="row mx-auto my-auto justify-content-center">
                <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel" style="width: 1200px;">
                  <div class="carousel-inner" role="listbox">
                    @php $count=0 @endphp
                    @foreach ($products as $product)
                      @if ($count==0)
                        {{ $count++ }}
                        <div class="carousel-item active">                          
                      @else
                        <div class="carousel-item">                        
                      @endif
                      <div class="col-md-3">
                        <div class="card shadow" style="width: 17rem;">
                          <a href="{{ route('product.show', $product->ProductID) }}">
                            <img src="{{ asset($product->Image) }}" class="card-img-top" alt="...">
                          </a>
                          <div class="card-body">
                            <h5 class="card-title"><strong class="price">{{ $product->Price }}</strong></h5>
                            <p class="card-text">{{ $product->Name }}</p>
                            <div class="d-flex justify-content-around pb-1 mb-1">
                              <div class="text-danger">
                                <i class="fa-solid fa-fire fa-beat"></i>
                              </div>
                              <div class="">
                                <a href="{{ route('product.show', $product->ProductID) }}">
                                  <button type="button" class="btn btn-outline-danger">Mua ngay</button>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>								
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
    </div>
    
    <div class="container">
      {{-- dien thoai --}}
        <section class="dien-thoai my-3">
            <div class="row border-bottom py-2">
                <div class="col text-uppercase">
                    <h3>Điện Thoại Nổi Bật Nhất</h3>
                </div>
                <div class="col-8">
                    <div class="row">
                        @foreach ($brands1 as $item)
                          <div class="col-2 mx-2 py-2 text-center border rounded-2">{{ $item->Name }}</div>    
                        @endforeach
                        <div class="col mx-2 py-2 text-center border rounded-2">
                          <a href="{{ route('phone.route') }}" class="my_menu_link">
                            Tất cả sản phẩm
                          </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-2">
              @foreach ($products1 as $product)    
                <div class="col-3">
                  <a href="{{ route('product.show', $product->ProductID) }}">
                  <section>
                    <div class="container py-2">
                      <div class="row">
                        <div class="col-md">
                          <div class="card shadow-lg" style="border-radius: 15px;">
                            <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light"
                              data-mdb-ripple-color="light">
                              <img src="{{ $product->Image }}"
                                style="border-top-left-radius: 15px; border-top-right-radius: 15px;" class="img-fluid"
                                alt="Laptop" />
                                <div class="mask"></div>
                            </div>
                            <div class="card-body pb-0">
                              <div class="d-flex justify-content-between">
                                <div>
                                  <p><strong class="h5">{{ $product->Name }}</strong></p>
                                </div>                                
                              </div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body pb-0">
                              <div class="d-flex justify-content-between fs-5">
                                <p><strong class="price">{{ $product->Price }}</strong></p>
                              </div>
                            </div>
                            <hr class="my-0" />
                            <div class="p-2">
                              <div class="d-flex justify-content-between pb-1 mb-1">
                                <div>
                                  <div class="d-flex flex-row justify-content-end mt-2 ms-3 text-danger">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                  </div>
                                </div>
                                <a href="{{ route('product.show', $product->ProductID) }}" class="btn btn-outline-danger">Mua ngay</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                  </a>
                </div>
              @endforeach                
            </div>
        </section>
      {{-- laptop --}}
        <section class="laptop my-3">
          <div class="row border-bottom py-2">
              <div class="col text-uppercase">
                  <h3>Laptop</h3>
              </div>
              <div class="col-8">
                  <div class="row">
                    <div class="row">
                      @foreach ($brands0 as $item)                        
                        <div class="col-2 mx-2 py-2 text-center border rounded-2">{{ $item->Name }}</div>    
                      @endforeach
                      <div class="col mx-2 py-2 text-center border rounded-2">
                        <a href="{{ route('laptop.route') }}" class="my_menu_link">
                          Tất cả sản phẩm
                        </a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row my-2">
            @foreach ($products0 as $product)    
              <div class="col-3">
                <a href="{{ route('product.show', $product->ProductID) }}">
                <section>
                  <div class="container py-2">
                    <div class="row">
                      <div class="col-md">
                        <div class="card shadow-lg" style="border-radius: 15px;">
                          <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light"
                            data-mdb-ripple-color="light">
                            <img src="{{ $product->Image }}"
                              style="border-top-left-radius: 15px; border-top-right-radius: 15px;" class="img-fluid"
                              alt="Laptop" />
                              <div class="mask"></div>
                          </div>
                          <div class="card-body pb-0">
                            <div class="d-flex justify-content-between">
                              <div>
                                <p><strong class="h5">{{ $product->Name }}</strong></p>
                              </div>                                
                            </div>
                          </div>
                          <hr class="my-0" />
                          <div class="card-body pb-0">
                            <div class="d-flex justify-content-between fs-5">
                              <p><strong class="price">{{ $product->Price }}</strong></p>
                            </div>
                          </div>
                          <hr class="my-0" />
                          <div class="p-2">
                            <div class="d-flex justify-content-between pb-1 mb-1">
                              <div>
                                <div class="d-flex flex-row justify-content-end mt-2 ms-3 text-danger">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                </div>
                              </div>
                              <a href="{{ route('product.show', $product->ProductID) }}" class="btn btn-outline-danger">Mua ngay</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                </a>
              </div>
            @endforeach                
          </div>
        </section>        
    </div>
</section>
@endsection
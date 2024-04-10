<section class="header bg-danger sticky-top" id="header">
    @auth 
    @else
        @php
            $numcart=0;
        @endphp    
    @endauth
    <div class="container py-0">
        <div class="row">
            <div class="col-md-2 pt-2">
                <a href="{{ route('home.route') }}"><img class="img-fluid" src="{{ asset('/images/logo.png') }}" alt="logo" srcset=""></a>
            </div>                
            <div class="col-md-3 pt-3">
                <div class="input-group mb-3">
                    <span class="input-group-text text-danger" id="basic-addon1" onclick="search()">
                        <strong><i class="fa-solid fa-magnifying-glass"></i></strong>
                    </span>
                    <input type="text" class="form-control" id="searchinput" 
                            placeholder="Tìm kiếm" aria-label="Tìm kiếm" aria-describedby="basic-addon1"
                    >
                </div>
            </div>
            <div class="col-md-7 text-white">
                <div class="row pt-3">
                    <div class="col-3">  
                        <a href="{{ route('cart.route') }}" class="my_header_link">                          
                        <div class="row">
                            <div class="col-3"><div class="fs-3"><i class="fa-solid fa-phone"></i></div></i></div>
                            <div class="col-9">
                                Gọi mua hàng <br><strong>0463299134</strong>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('cart.route') }}" class="my_header_link">
                        <div class="row">
                            <div class="col-3"><div class="fs-3"><i class="fa-solid fa-location-dot"></i></div></div>
                            <div class="col-9"><p>Cửa hàng <br> gần bạn</p></div>
                        </div>
                        </a>
                    </div>
                    <div class="col">                            
                        <a href="{{ route('deliver.route') }}" class="my_header_link">
                        <div class="row">
                            <div class="col-3"><div class="fs-3"><i class="fa-solid fa-truck-arrow-right"></i></div></div>
                            <div class="col-9"><p>Tra cứu <br>đơn hàng</p></div>
                        </div>
                        </a>
                    </div>
                    <div class="col">
                        </a>
                        <a href="{{ route('cart.route') }}" class="my_header_link">
                            <div class="row">
                                <div class="col-3 position-relative">
                                    <div class="fs-3"><i class="fa-solid fa-cart-shopping"></i></div>
                                        <span class="position-absolute top-0 start-110 translate-middle badge rounded-pill bg-white text-danger">
                                            <strong id="numcart">{{ $numcart }}</strong> <span class="visually-hidden">unread messages</span>
                                        </span>
                                    </div>
                                <div class="col-9"><p>Giỏ <br> hàng</p></div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        @auth
                            <a href="{{ route('logout') }}" class="my_header_link">
                        @else
                            <a href="{{ route('login.route') }}" class="my_header_link">
                        @endauth
                        
                        <div class="row px-4 ">
                            <div class="col"><div class="fs-5"><i class="fa-solid fa-circle-user"></i></div></i></div>
                        </div>
                        <div class="row">
                        @auth
                            <div class="col fs-6"><strong>Đăng xuất</strong></div>  
                        @else
                            <div class="col fs-6"><strong>Đăng nhập</strong></div>
                        @endauth
                            
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('/import/js/bootstrap.bundle.js') }}"></script>
<script>
    var searchInput = document.getElementById('searchinput');
    searchInput.addEventListener('keypress', function(event) {
      if (event.keyCode === 13) {
        search();
      }
    });
    function search() {
      var searchTerm = document.getElementById('searchinput').value;
      if(searchTerm!==null && searchTerm.trim()!==''){
        window.location.href = 'http://laravel-duc:8000/search/'+searchTerm;
      }
      
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
      var priceElements = document.querySelectorAll('.price');

      priceElements.forEach(function (element) {
        var price = parseFloat(element.textContent.replace(/,/g, ''));
        var formattedPrice = price.toLocaleString('vi-VN');
        var finalPrice = formattedPrice + '<sup>đ</sup>';
        element.innerHTML = finalPrice;
      });
    });
</script>
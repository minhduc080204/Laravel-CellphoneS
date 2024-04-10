<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://kit.fontawesome.com/d05d5d7cf6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/import/admin/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/import/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/import/style.css') }}">
    @yield('addlink')
    <style>
      .div_cart{
            border: solid rgb(212, 211, 211) 2px;
        }
        .div_cart:hover{
            border: solid red 2px;
        }
    </style>
  </head>
  <body>
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar" class="bg-danger">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-danger">
            <i class="fa fa-bars text-light"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
        </div>
        <div class="p-4 pt-5">
          <h1><a href="{{ route('admin.route') }}" class="logo">S-Admin</a></h1>
          <ul class="list-unstyled components mb-5">
            <li>
              <a href="{{ route('admin.route') }}">Trang chủ</a>
            </li>
            <li>
              <a
                href="#pageSubmenu"
                data-toggle="collapse"
                aria-expanded="false"
                class="dropdown-toggle"
                >Đơn hàng</a
              >
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                  <a href="{{ route('accept.route') }}">Chờ xác nhận</a>
                </li>
                <li>
                  <a href="{{ route('shipping.route') }}">Đang giao</a>
                </li>
                <li>
                  <a href="{{ route('delivered.route') }}">Đã giao</a>
                </li>
              </ul>
            </li>
            <li>
              <a
                href="#pageProduct"
                data-toggle="collapse"
                aria-expanded="false"
                class="dropdown-toggle"
                >Thêm sảm phẩm</a
              >
              <ul class="collapse list-unstyled" id="pageProduct">
                <li>
                  <a href="{{ route('addlaptop.route') }}">Laptop</a>
                </li>
                <li>
                  <a href="{{ route('addphone.route') }}">Điện thoại</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#">Contact</a>
            </li>
          </ul>
          <div class="mb-4">
            <h3 class="h6">Tìm kiếm sản phẩm</h3>
            <div class="form-group d-flex">
              <div class="icon"><span class="icon-paper-plane"></span></div>
              <input id="searchinput"
              type="text"
              class="form-control"
              placeholder="Nhập tên sản phẩm"
              />
            </div>
          </div>

          <div class="footer">
            <ul class="list-unstyled components">				
              <li>
              <a href="{{ route('logout') }}"><center><strong>Đăng xuất</strong></center></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        @yield('main')
      </div>
    </div>
    <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button">
      <i class="fas fa-arrow-up"></i>
    </a>

    <script src="{{ asset('/import/admin/js/jquery.min.js') }}"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="{{ asset('/import/admin/js/popper.js') }}"></script>
    <script src="{{ asset('/import/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/import/admin/js/main.js') }}"></script>
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
          window.location.href = 'http://laravel-duc:8000/adminsearch/'+searchTerm;
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
  </body>
</html>

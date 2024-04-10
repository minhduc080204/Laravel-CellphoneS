<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/import/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <title>@yield('title')</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://kit.fontawesome.com/d05d5d7cf6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/import/style.css') }}">
    @yield('addcss')
</head>
<body>
    @include('layouts.header')
    
    <section class="main-content">
        @yield('main')
    </section>

    <section class="footer shadow-lg py-3 mt-4">
        <div class="container">
            <div class="row py-2">
                <div class="col">
                    <h6>Tổng đài hỗ trợ miễn phí</h6>
                    <ul>
                        <li>Gọi mua hàng 1800.2097 (7h30 - 22h00)</li>
                        <li>Gọi khiếu nại 1800.2063 (8h00 - 21h30)</li>
                        <li>Gọi bảo hành 1800.2064 (8h00 - 21h00)</li>
                    </ul>
                    <h6>Phương thức thanh toán</h6>
                    <ul class="list-group list-group-horizontal fs-3">
                        <a href=""><li class="list-group-item"><i class="fa-brands fa-cc-apple-pay"></i></i></li></a>
                        <a href=""><li class="list-group-item"><i class="fa-brands fa-cc-paypal"></i></i></li></a>
                        <a href=""><li class="list-group-item"><i class="fa-brands fa-cc-amazon-pay"></i></i></li></a>
                        <a href=""><li class="list-group-item"><i class="fa-brands fa-google-pay"></i></li></a>
                    </ul>   
                </div>
                <div class="col">
                    <h6>Thông tin và chính sách</h6>
                    <ul class="text-dark">
                        <a class="link-offset-2 link-underline link-underline-opacity-0 text-black" href="#"><li>Mua hàng và thanh toán Online</li></a>
                        <a class="link-offset-2 link-underline link-underline-opacity-0 text-black" href="#"><li>Mua hàng trả góp Online</li></a>
                        <a class="link-offset-2 link-underline link-underline-opacity-0 text-black" href="#"><li>Chính sách giao hàng</li></a>
                        <a class="link-offset-2 link-underline link-underline-opacity-0 text-black" href="#"><li>Tra điểm Smember</li></a>
                        <a class="link-offset-2 link-underline link-underline-opacity-0 text-black" href="#"><li>Xem ưu đãi Smember</li></a>
                        <a class="link-offset-2 link-underline link-underline-opacity-0 text-black" href="#"><li>Tra thông tin bảo hành</li></a>
                        <a class="link-offset-2 link-underline link-underline-opacity-0 text-black" href="#"><li>Tra cứu hoá đơn điện tử</li></a>
                        <a class="link-offset-2 link-underline link-underline-opacity-0 text-black" href="#"><li>Thông tin hoá đơn mua hàng</li></a>
                        <a class="link-offset-2 link-underline link-underline-opacity-0 text-black" href="#"><li>Trung tâm bảo hành chính hãng</li></a>
                        <a class="link-offset-2 link-underline link-underline-opacity-0 text-black" href="#"><li>Quy định về việc sao lưu dữ liệu</li></a>
                    </ul>
                </div>
                <div class="col">
                  <h6>Kết nối với CellphoneS</h6><br>
                  <ul class="list-group list-group-horizontal fs-2">
                      <a href=""><li class="list-group-item"><i class="fa-brands fa-youtube"></i></li></a>
                      <a href=""><li class="list-group-item"><i class="fa-brands fa-facebook"></i></li></a>
                      <a href=""><li class="list-group-item"><i class="fa-brands fa-instagram"></i></li></a>
                      <a href=""><li class="list-group-item"><i class="fa-brands fa-tiktok"></i></li></a>
                  </ul>   
                  <br>
                  <h6>Website thành viên</h6>
                  <p>Hệ thống bảo hành sửa chữa Điện thoại - Máy tính</p>
                  <p>Trung tâm bảo hành uỷ quyền Apple</p>
                  <p>Kênh thông tin giải trí công nghệ cho giới trẻ</p>
                  <p>Trang thông tin công nghệ mới nhất</p>
              </div>
                <div class="col">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d171926.61783248678!2d107.44421798663306!3d16.547871911522677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141079cd304f30b%3A0x188725f5c0afe707!2zw4JtIHRoYW5oIEPDtG5nIFR1eQ!5e0!3m2!1svi!2s!4v1704157057297!5m2!1svi!2s" width="110%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <p class="fs-6">Công ty TNHH Thương Mại và Dịch Vụ Kỹ Thuật DIỆU PHÚC - GPĐKKD: 0316172372 cấp tại Sở KH & ĐT
                            TP. HCM. Địa chỉ văn phòng: 350-352 Võ Văn Kiệt, Phường Cô Giang, Quận 1, Thành phố Hồ Chí Minh, Việt Nam.
                            Điện thoại: 028.7108.9666.</p>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

    <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button">
        <i class="fas fa-arrow-up"></i>
    </a>

    @yield('addscrip')
    <script src="{{ asset('/import/scrip.js') }}"></script>
    <script>
        $(document).ready(function(){
            $(window).scroll(function () {
                if ($(this).scrollTop() > 50) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });
            // scroll body to 0px on click
            $('#back-to-top').click(function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 400);
                return false;
            });
        });
    </script>
    
</body>
</html>

@extends('layouts.cart')
@section('name', 'Đăng nhập')

@section('main')
    <div class="container">
        <div class="h3 m-2"><center>Đăng nhập Smember</center></div>
        <center><img class="img-fluid fs-6" src="images/sicon.webp" alt="" style="width: 15%;"></center>
        <div class="row p-2" style="width: 50%; margin-left: 25%;">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-floating mb-3 p-1">
                    <input type="text" class="form-control" id="floatingInput1" name="email"
                        required placeholder="">
                    <label for="floatingInput">Số điện thoại/Email</label>
                </div>
                <div class="form-floating mb-3 p-1">
                    <input type="password" class="form-control" id="floatingInput2" name="password"
                        required placeholder="">
                    <label for="floatingInput">Mật khẩu</label>
                </div>
                <button type="submit" class="btn btn-danger fs-5 p-1" style="width: 100%;"><strong>Đăng nhập</strong></button>
            </form>
            <div class="row mt-3">
                <div class="col"><hr></div>
                <div class="col"><center>hoặc đăng nhập bằng</center></div>
                <div class="col"><hr></div>
            </div>
            <center>                
                <a href="" class="my_menu_link"><img class="img-fluid m-1 p-1" style="width: 5%;" src="images/google.webp" alt="">Google</a>
                <a href="" class="my_menu_link"><img class="img-fluid m-1 p-1" style="width: 5%;" src="images/zalo.png" alt="">Zalo</a>
                <br>
                <p class="h5 mt-3">Bạn chưa có tài khoản? <strong><a href="{{ route("register.route") }}" class="text-danger">Đăng ký ngay</a></strong></p>
            </center>
        </div>
    </div>

    <div class="alert alert-success fixed-top fs-5" id="success" role="alert" 
        style="width: 26%; margin-left : 38%; margin-top: 5%; display: none">
        <center><strong>Đăng ký tài khoản thành công !</strong></center>
    </div>
    <div class="alert alert-danger fixed-top fs-5" id="error" role="alert" 
        style="width: 26%; margin-left : 38%; margin-top: 5%; display: none">
        <center><strong>Sai tài khoản hoặc mật khẩu</strong></center>
    </div>

    <script>
        function error($id){
            document.getElementById($id).style.display='block';
            setTimeout(function() {
                document.getElementById($id).style.display='none';
            }, 3000); 
        }        
        @if (session('error')==1)
            error('error');
        @endif 
        @if (session('error')==2)
            error('success');
        @endif         
    </script>
@endsection
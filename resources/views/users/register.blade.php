@extends('layouts.cart')
@section('name', 'Đăng nhập')

@section('main')
<div class="container">
    <div class="h3 m-2"><center>Đăng ký Smember</center></div>
    <center><img class="img-fluid fs-6" src="images/sicon.webp" alt="" style="width: 15%;"></center>
    <div class="row p-2" style="width: 50%; margin-left: 25%;">
        <form action="{{ route('register') }}" method="post" id="submitform">
            @csrf
            <div class="form-floating mb-3 p-1">
                <input type="text" class="form-control" id="floatingInput1" name="name"
                    required placeholder="">
                <label for="floatingInput1">Họ và tên</label>
            </div>
            <div class="form-floating mb-3 p-1">
                <input type="email" class="form-control" id="floatingInput2" name="email"
                    required placeholder="">
                <label for="floatingInput2">Email</label>
            </div>
            <div class="form-floating mb-3 p-1">
                <input type="password" class="form-control" id="floatingInput3" name="password" 
                    required placeholder="">
                <label for="floatingInput3">Mật khẩu</label>
            </div>                
            <div class="form-floating mb-3 p-1">
                <input type="password" class="form-control" id="floatingInput4" name="re_password" 
                    required placeholder="">
                <label for="floatingInput4">Xác nhận mật khẩu</label>
            </div>
            <button type="submit" class="btn btn-danger fs-5 p-1" style="width: 100%;"><strong>Đăng ký</strong></button>
        </form>
        <center>                
            <p class="h5 mt-3 mb-5">Bạn đã có tài khoản? <strong><a href="{{ route("login.route") }}" class="text-danger">Đăng nhập ngay</a></strong></p>
        </center>
    </div>

    <div class="alert alert-danger fixed-top fs-5" id="error" role="alert" 
        style="width: 26%; margin-left : 38%; margin-top: 5%; display: none">
        <center><strong id="stringg"></strong></center>
    </div>
</div>
<script>
    function error($string){
        document.getElementById('stringg').innerHTML=$string;
        document.getElementById('error').style.display='block';
        setTimeout(function() {
          document.getElementById('error').style.display='none';
        }, 3000); 
    }
    @if (session('error')==1)
        error('Email đã tồn tại !');
    @endif 
    @if (session('error')==3)
        error('Email không tồn tại !');
    @endif 
    $('#submitform').submit(function(event){
        var pass=$('input[name="password"]').val();
        var repass=$('input[name="re_password"]').val();
        if(pass.length<8){
            error('Độ dài mật khẩy phải lớn hơn 8 !');
            event.preventDefault();
            return false;
        }
        if(pass!=repass){
            error('Xác nhận mật khẩu không chính xác !');
            event.preventDefault();
            return false;
        }        
    });
</script>
@endsection
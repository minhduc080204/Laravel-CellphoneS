@extends('layouts.cart')
@section('main')
<body style="background-color: rgb(245, 245, 245);">
<div class="mx-auto p-2" style="width: 50%">
        <div class="row fs-4 mb-2 border-bottom border-3">
            <div class="col-1"><a href="{{ route('cart.route') }}" id="back" onclick="">
                <i class="img-fluid fa-solid fa-arrow-left"></i>
            </a></div>
            <div class="col-10 text-center">
                <strong>Thông tin</strong>
            </div>
        </div>
        <div class="sticky-top p-2" style="background-color: rgb(245, 245, 245)">
            <div class="row fs-5">
                <div class="col p-2 mx-4 border-bottom border-5 border-danger text-danger">
                    <center><strong>1. Thông tin</strong></center>
                </div>
                <div class="col p-2 mx-4 border-bottom border-5" id="thanhtoandiv">
                    <center><strong>2. Thanh toán</strong></center>
                </div>
            </div>
        </div>
        @php $sumprice = 0; $sumquantity = 0 @endphp
        @foreach ($carts as $cart)
        @php $sumprice += $cart->products->Price*$cart->Quantity; $sumquantity+=$cart->Quantity @endphp
        <div class="border rounded p-1 bg-white m-2">
            <div class="row fs-6">
                <div class="col-3">
                    <img class="img-fluid" src="{{ asset($cart->products->Image) }}" alt="laptop" srcset="">
                </div>
                <div class="col-7 p-3">
                    Tên sản phẩm: <strong>{{ $cart->products->Name }}</strong> <br> 
                    Phiên bản: <strong>{{ $cart->versions->Version }}</strong> <br> 
                    Màu sắc: <strong>{{ $cart->colors->Color }}</strong> <br> 
                    Giá tiền: <strong class="price fs-5 p-2">{{ $cart->products->Price }}</strong>
                </div>
                <div class="col-2 p-3">Số lượng: {{ $cart->Quantity }}</div>
            </div>
        </div>   
        @endforeach 
<form action="" method="get" id="thongtin" style="display: block;">
    <section class="m-2">
        <h5>Thông tin khách hàng</h5>
        <div class="border rounded p-3 bg-white">
            <div class="row">                        
                <div class="col p-2 m-1 ">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" 
                            required placeholder="" onchange="userinput(this, 'name')">
                        <label for="floatingInput">Họ và tên</label>
                    </div>
                </div>
                <div class="col p-2 m-1">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" 
                            required placeholder="" onchange="userinput(this, 'contact')">
                        <label for="floatingInput">Số điện thoại</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col p-2 m-1">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" 
                            required placeholder="name@example.com" onchange="userinput(this, 'gmail')">
                        <label for="floatingInput">Email</label>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="m-2">
        <h5>Thông tin nhận hàng</h5>
        <div class="border rounded p-3 bg-white">
            <div class="row p-1 m-2">                        
                <div class="col p-2 m-1">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Default select example" id="province" required></select>
                        <label for="floatingSelect">TỈNH/THÀNH PHỐ</label>
                    </div>
                </div>
                <div class="col p-2 m-1">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Default select example" id="district" required>
                            <option disabled selected>Chọn</option>
                        </select>
                        <label for="floatingSelect">QUẬN/HUYỆN</label>
                    </div>
                </div>        
            <div class="row p-1 m-2 mb-0">
                <div class="col-5 p-2 m-1">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Default select example" id="ward" 
                            required onchange="address('address')">
                            <option disabled selected>Chọn</option>
                        </select>
                        <label for="floatingSelect">PHƯỜNG/XÃ</label>
                    </div>
                </div>
                <div class="col-6 p-2 m-1 ">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="diachi" placeholder=""
                            required onchange="address('address')">
                        <label for="diachi">Tên đường, Số nhà,..</label>
                    </div>
                </div>
            </div>
            <div class="row p-1">
                <div class="col p-2">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control" id="floatingInput" placeholder="">
                        <label for="floatingInput">Ghi chú (nếu có)</label>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="m-2">
        <p><strong>Mẹo:</strong> Bạn có đăng nhập để đặt hàng nhanh hơn.</p>
    </section>
    
    <div class="m-5"></div>
    <section class="sticky-bottom rounded-3 shadow-lg mx-auto m-1">
        <div class="row p-3 bg-white fs-6">
            <div class="row">
                <div class="col-1"></div>
                <div class="col">
                    <strong>Tổng tiền tạm tính: </strong>
                </div>
                <div class="col"></div>
                <div class="col">
                    <strong class="price h5">{{ $sumprice }}</strong>
                </div>
            </div>
            <div class="row mt-2">
                <button class="btn btn-outline-danger" id="thongtin_bt" type="submit"><center>Tiếp tục</center></button>
            </div>
        </div>
    </section>
</form>

<form action="{{ route('cartssuccess') }}" method="get" id="thanhtoan" style="display: none">
    <div class="border rounded p-4 bg-white mb-3">
        <div class="row">
            <div class="col-6">Số lượng sản phẩm</div>
            <div class="col-6 d-flex flex-row-reverse">0{{ $sumquantity }}</div>
            <input type="text" name="sumquantity" value="{{ $sumquantity }}" hidden>
            
            <div class="col-6">Tiền hàng (tạm tính)</div>
            <div class="col-6 d-flex flex-row-reverse"><strong class="price">{{ $sumprice }}</strong></div>
            <input type="text" name="sumprice" value="{{ $sumprice }}" hidden>

            <div class="col-6">Chi phí vận chuyển</div>
            <div class="col-6 d-flex flex-row-reverse">Miễn phí</div>
        </div>
        <hr>
        <div class="row fs-5">
            <div class="col-6">
                <strong>Tổng tiền</strong>
            </div>
            <div class="col-6 d-flex flex-row-reverse">
                <center><strong class="price">{{ $sumprice }}</strong></center>
            </div>
        </div>
    </div>

    <h5>Thông tin nhận hàng</h5>
    <div class="border rounded p-4 bg-white mb-3">
        <div class="row">
            <div class="col-6">Tên khách hàng</div>
            <div class="col-6 d-flex flex-row-reverse">
                <input class="inputhidden" type="text" name="name" id="name" readonly>
            </div>

            <div class="col-6">Số điện thoại</div>
            <div class="col-6 d-flex flex-row-reverse">
                <input class="inputhidden" type="text" name="contact" id="contact" readonly>
            </div>

            <div class="col-6">Email</div>
            <div class="col-6 d-flex flex-row-reverse">
                <input class="inputhidden" type="text" name="gmail" id="gmail" readonly>
            </div>

            <div class="col-3">Nhận hàng tại</div>
            <div class="col-9 d-flex flex-row-reverse">
                <input class="inputhidden" type="text" name="address" id="address" readonly>
            </div>
        </div>
    </div>
    <div style="font-size: 18px;">
        <input type="checkbox" name="" id="" style="width: 18px; height: 18px;" class="mt-2" required>
        <i>Bằng việc Đặt hàng, bạn đồng ý với Điều khoản sử dụng của CellphoneS.</i>
    </div>

        <section>
            @foreach ($carts as $cart)
                <input type="text" name="CartsID[]" value="{{ $cart->CartID }}" hidden>
            @endforeach
        </section>
    
    <div class="m-5"></div>
    <section class="sticky-bottom rounded-3 shadow-lg mx-auto m-1">
        <div class="row p-3 bg-white fs-6">
            <div class="row">
                <div class="col-1"></div>
                <div class="col">
                    <strong>Tổng tiền : </strong>
                </div>
                <div class="col"></div>
                <div class="col">
                    <strong class="price h5">{{ $sumprice }}</strong>
                </div>
            </div>
            <div class="row mt-2">
                <button class="btn btn-outline-danger" type="submit"><center><strong>Thanh toán</strong></center></button>
            </div>
        </div>
    </section>
</form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const host = "https://provinces.open-api.vn/api/";
    var callAPI = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data, "province");
            });
    }
    callAPI('https://provinces.open-api.vn/api/?depth=1');
    var callApiDistrict = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.districts, "district");
            });
    }
    var callApiWard = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.wards, "ward");
            });
    }

    var renderData = (array, select) => {
        let row = ' <option disable value="">Chọn</option>';
        array.forEach(element => {
            row += `<option value="${element.code}">${element.name}</option>`
        });
        document.querySelector("#" + select).innerHTML = row
    }

    $("#province").change(() => {
        callApiDistrict(host + "p/" + $("#province").val() + "?depth=2");
        // callApiWard(host + "d/" + $("#district").val() + "?depth=2");
    });
    $("#district").change(() => {
        callApiWard(host + "d/" + $("#district").val() + "?depth=2");
       
    });
</script>
<script>
    document.getElementById('header').style.position='relative';
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('thongtin_bt').onclick=function(){
            if(document.getElementById('thongtin').checkValidity()){
                document.getElementById('thongtin').style.display='none';
                document.getElementById('thanhtoan').style.display='block';
                document.getElementById('back').setAttribute('href', '#');
                document.getElementById('back').onclick=back;
                document.getElementById('thanhtoandiv').classList.add('border-danger');
                document.getElementById('thanhtoandiv').classList.add('text-danger');
            }
                document.getElementById('thongtin').addEventListener('submit', function(event) {
                    event.preventDefault();
                });
            
        };        

        function back(even) {
            event.preventDefault();
            document.getElementById('thongtin').style.display = 'block';
            document.getElementById('thanhtoan').style.display = 'none';
            document.getElementById('thanhtoandiv').classList.remove('border-danger');
            document.getElementById('thanhtoandiv').classList.remove('text-danger');
            document.getElementById('back').setAttribute('href', '{{ route('cart.route') }}');
            document.getElementById('back').onclick='';
        }
    });
    function userinput(inputElement, id) {
        var inputValue = inputElement.value;
        document.getElementById(id).value = inputValue;
    }
    function address(id){
        let result = $("#diachi").val() +" | " + 
                    $("#ward option:selected").text() + " | " +
                    $("#district option:selected").text()+ " | " +
                    $("#province option:selected").text();
        document.getElementById(id).value = result;
    }
</script>
<style>
    .inputhidden{
        border: none;
        background: #ffffff;
        text-align: right;
        width: 100%;
    }
</style>
</body>
@endsection
@extends('layouts.cart')
@section('title', 'Cart')
@section('addlink')
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection
@section('main')
<body>
  <div class="mx-auto p-2" style="width: 50%">
    <div class="row fs-4 mb-2 border-bottom border-3">
        <div class="col-1"><a href="{{ route('home.route') }}"><i class="img-fluid fa-solid fa-arrow-left"></i></a></div>
        <div class="col-10 text-center">
            <strong>Giỏ hàng của bạn</strong>
        </div>
    </div>
    <section class="h-100 h-custom" style="background-color: #d2c9ff;">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col">
                <div class="p-5">
  <form action="{{ route('pay.route') }}" method="post">
    @csrf
                  @foreach ($carts as $cart)
                  <div class="row mb-4 d-flex justify-content-between align-items-center" id="cart{{ $cart->CartID }}">
                    <input class="form-check-input mt-0 fs-5 border rounded-5" name="checkbox[]" onclick="selected()" 
                    type="checkbox" value="{{ $cart->CartID }}" aria-label="Radio button for following text input">
                    <div class="col-md-2">
                      <img
                        src="{{ asset($cart->products->Image) }}"
                        class="img-fluid rounded-3" alt="Product">
                    </div>
                    <div class="col-md-3">
                      <h6 class="text-black mb-0">{{ $cart->products->Name }}</h6>
                      <h6 class="text-muted">{{ $cart->versions->Version }}, {{ $cart->colors->Color }}</h6>
                    </div>
                    <div class="col-md-2 d-flex">
                      <button class="btn btn-link px-2" type="button"
                        onclick="this.parentNode.querySelectorAll('input[type=number]').forEach(function(input) {
                          input.stepDown(); }); selected(); update('{{ $cart->CartID }}')">
                        <i class="fas fa-minus"></i>
                      </button>

                      <input id="check" min="1" name="quantity" value="{{ $cart->Quantity }}" type="number" 
                       maxlength="{{ $cart->products->Price }}" disabled style="width: 50px;" class="ps-2"/>
                      <input type="number" id="qtt{{ $cart->CartID }}" name="temp" value="{{ $cart->Quantity }}" hidden>

                      <button class="btn btn-link px-2" type="button"
                        onclick="this.parentNode.querySelectorAll('input[type=number]').forEach(function(input) {
                          input.stepUp(); }); selected(); update('{{ $cart->CartID }}')">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                    <div class="col-md-3">
                      <center><strong class="price h5">{{ $cart->products->Price }}</strong></center>
                    </div>
                    <div class="col-md-1 text-end">
                      <a href="#!" class="text-muted" id="remove{{ $cart->CartID }}" onclick="removecart('{{ $cart->CartID }}'); selected()">
                        <i class="fas fa-times"></i>
                      </a>
                    </div>
                    <hr class="my-4">   
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <input type="text" id="sumprice" hidden>
      <section class="sticky-bottom border border-1 shadow-lg mx-auto">
        <div class="row p-3 bg-white">
            <div class="col-9 fs-5">
            Tạm tính <strong id="sum" class="price">0 </strong><br> 
            </div>
            <div class="col border rounded" style="background: gray" id="divpay">
                <center>
                <button type="submit"
                  class="btn btn text-white p-2 fs-5" id="pay" style="pointer-events: none ">
                    <strong> Mua ngay (<strong id="num">0</strong>)</strong>
                </button>
                </center>
  </form>
            </div>
        </div>
    </section>    
  </div>    

  <div class="fixed-top" style="width: 100%; height: 100%; background: #e3e3e379; display: none" id="success">
    <div class="d-flex justify-content-center mt-5">
      <div class="alert alert-success" role="alert">
        <center>Đặt hàng thành công! Hóa đơn được gửi tại email.</center>
      </div>
    </div>
  </div>
  <div class="alert alert-danger fixed-top fs-5" id="alert_add" role="alert" 
        style="width: 26%; margin-left : 38%; margin-top: 5%; display: none">
    <center><strong>Giỏ hàng không thể nhỏ hơn 1 !</strong></center>
  </div>

  <script>
    // chọn sản phẩm
    function selected(){   
      var sum=0;
      var num=0;
      var boxes = $('input[name="checkbox[]"]');
      var cart=document.getElementsByName('quantity');
      cart.forEach(function(item) {
          var checkbox = item.parentNode.parentNode.querySelector('input[name="checkbox[]"]');
          if (checkbox.checked) {
            item.id='nice';
            num=1;
          }else{
            item.id='null';
          }
      });
      if (num == 1) {
        document.getElementById('pay').style.pointerEvents = 'auto';          
        document.getElementById('divpay').style.background = 'red';
        num = 0;
      } else {
        document.getElementById('pay').style.pointerEvents = 'none';
        document.getElementById('divpay').style.background = 'grey';
      }
      for($i=0;$i<boxes.length;$i++){
        if(cart[$i].id=='nice'){
          sum+=cart[$i].value*cart[$i].maxLength;
          num++;
        }
      }  
      document.getElementById('sumprice').value=num;
      var formattedSum = sum.toLocaleString('vi-VN', { style: 'decimal' })+'  VNĐ';                      
      document.getElementById("sum").innerHTML=formattedSum;
      document.getElementById("num").innerHTML=num;  
    } 
    // thêm số lượng 
    function update($id){
      var Quantity=document.getElementById('qtt'+$id).value;
      if(Quantity>0){
        $.ajax({
          url: "{{ route('addquantity') }}",
          type: 'POST',
          data: { 
            _token: '{{ csrf_token() }}',
            Quantity: Quantity,
            CartID: $id,
          },
          success: function (data) {

          },
          error: function (error) {
              console.log('Error:', error);
          }
        });
      }else{
        document.getElementById('alert_add').style.display='block';
        setTimeout(function(){
          document.getElementById('alert_add').style.display='none';
        },3000);
      }
    }  
    @if (session('success')==1)
      document.getElementById('success').style.display='block';
      setTimeout(function() {
          document.getElementById('success').style.display='none';
      }, 2000);
      {{ session()->put('success', '0') }}
    @endif  
  </script>     
  <script>
    // xóa sản phẩm
    function removecart($id){
      $('#cart'+$id).remove();

      var CartId=$id;
      var Numcart= $('#numcart').text();
      return new Promise(function(resolve, reject) {
        $.ajax({
          url: "{{ route('removecart') }}",
          type: 'POST',
          data: { 
              _token: '{{ csrf_token() }}',
              CartId: CartId,
              Numcart: Numcart,
          },
          success: function (data) {
              $('#numcart').text(data.numcart);
              
          },
          error: function (error) {
              console.log('Error:', error);
          }
        });
      });
    }
    // thanh toán
    function pay(){
      var arrID=[];
      var cart=document.getElementsByName('temp');
      cart.forEach(function(item) {
          var checkbox = item.parentNode.parentNode.querySelector('input[name=checkbox[]]');
          if (checkbox.checked) {
            arrID.push(item.id);
          }
      });
      $.ajax({
        url: "{{ route('pay.route') }}",
        type: 'POST',
        data: { 
            _token: '{{ csrf_token() }}',
            CartIDs: arrID,
        },
        success: function (data) {
            
        },
        error: function (error) {
            console.log('Error:', error);
        }
      });
    }
</script>
</body>
@endsection
@extends('layouts.product')

@section('producer')
  @foreach ($brands as $item)
    <div class="col-1 border rounded m-1 pb-1"><img class="img-fluid" src="{{ asset($item->Image) }}" alt="producer"></div>  
  @endforeach
@endsection

@section('producer3')    
    <div class="col-2 mx-2 py-2 text-center border rounded-2">Thinkpad</div>
    <div class="col-2 mx-2 py-2 text-center border rounded-2">Asus</div>
    <div class="col-2 mx-2 py-2 text-center border rounded-2">HP</div>            
@endsection

@section('product')
  <div class="row my-2">
    @foreach ($products as $product)          
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

@endsection
@extends('layouts.home')
@section('title', 'Product')

@section('main')
  <section class="top">
    <section class="quangcao my-2">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="{{ asset('images/laptops/quangcao/cate office.webp') }}" class="img-fluid d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="{{ asset('images/laptops/quangcao/intel gaming cate.webp') }}" class="img-fluid d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="{{ asset('images/laptops/quangcao/Intel gaming new.webp') }}" class="img-fluid d-block w-100" alt="...">
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
                <div class="col-6">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="{{ asset('images/laptops/quangcao/cate office.webp') }}" class="img-fluid d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="{{ asset('images/laptops/quangcao/intel gaming cate.webp') }}" class="img-fluid d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="{{ asset('images/laptops/quangcao/Intel gaming new.webp') }}" class="img-fluid d-block w-100" alt="...">
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
            </div>
        </div>
    </section>
    <section class="producer my-2">
        <div class="container">
            <div class="row">
                @yield('producer')                
            </div>
        </div>
    </section>
</section>

<section class="main my-3">
  <div class="container">
    <section class="laptop my-3">
      <div class="row border-bottom py-2">
          <div class="col text-uppercase">
            <h3>{{ $name }}</h3>
          </div>
          <div class="col-8">
            <div class="row d-flex flex-row-reverse">
              <div class="col-2 mx-2 py-2 text-center border rounded-2">Cao - Thấp</div>
              @yield('producer3')                
            </div>
          </div>
      </div>
      @yield('product')
    </section>
  </div>
</section>
<section class="bot my-3"></section>
@endsection
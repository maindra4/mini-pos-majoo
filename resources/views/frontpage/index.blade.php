@extends('layout.frontpage.layout')

@section('content')
	<div class="content-wrapper container-xxl p-0">
		<div class="content-header row">
			<div class="content-header-left col-md-9 col-12 mb-2">
				<div class="row breadcrumbs-top">
					<div class="col-12">
						<h2 class="content-header-title float-start mb-0" style="border: 0">Product</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="content-body">
      @if(session()->has('success'))
        <div class="alert alert-success mb-1" role="alert">
          <h4 class="alert-heading">Success</h4>
          <div class="alert-body">{{ session('success') }}</div>
        </div>
      @endif
			<section id="ecommerce-products">
        <div class="row">
          @foreach($product['data'] as $row) 
            <div class="col-3">
              <div class="card ecommerce-card">
                <div class="item-img text-center">
                  <a href="#">
                    <img class="img-fluid card-img-top" src="{{ $row['image'] }}" alt="img-placeholder" />
                  </a>
                </div>
                <div class="card-body text-center">
                  <div class="item-wrapper">
                    <div class="item-cost">
                      <h4 class="item-price">{{ $row['name'] }}</h4>
                    </div>
                    
                    <div class="item-cost">
                      <h5 class="item-price mt-1" style="font-weight: bold">{{ $row['price_sell'] }}</h5>
                    </div>
                  </div>
                  <p class="card-text item-description mt-3">{!! $row['description'] !!}</p>
                </div>
                <div class="item-options text-center mb-2">
                  @if($row['stock'] < 1)
                    <a href="#" class="btn btn-primary disabled btn-cart">
                      <span class="add-to-cart">Stock Habis</span>
                    </a>
                  @else
                    <a href="checkout/{{ $row['id'] }}" class="btn btn-primary btn-cart">
                      <i data-feather="shopping-cart"></i>
                      <span class="add-to-cart">Beli</span>
                    </a>
                  @endif
                  
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </section>
		</div>
	</div>
@endsection
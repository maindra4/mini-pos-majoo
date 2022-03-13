@extends('layout.layout')

@section('content')
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
      <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-start mb-0">Detail Product</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/product">Product</a>
                </li>
                <li class="breadcrumb-item active">Detail
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
		<div class="content-body">
			<div class="row">
				<div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-3 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                  <div class="d-flex align-items-center justify-content-center">
                      <img src="{{ url('storage/'.$product->product_image) }}" class="img-fluid product-img" alt="product image">
                  </div>
                </div>
                <div class="col-12 col-md-9">
                  <h4>{{ $product->product_name }}</h4>
                  <div class="d-flex flex-wrap mt-1">
                    <p class="item-price me-1">Rp. {{ number_format($product->price_sell) }}</p>
                  </div>
                  <p class="card-text">
                    @if($product->stock > 0)
                      Available - <span class="text-success">In stock ({{ $product->stock }})</span>
                    @else
                      <span class="text-danger">Out of stock</span>
                    @endif
                  </p>
                  <p class="card-text">
                    {!! $product->description !!}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
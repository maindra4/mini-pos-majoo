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
                  <input type="hidden" id="product_id" value="{{ $product->id }}">
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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Histori Penjualan</h4>
            </div>
            <div class="card-body">
              <table class="history-table table">
                <thead>
                  <tr>
                    <th>Transaction Date</th>
                    <th>Customer</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Stock Diary</h4>
            </div>
            <div class="card-body">
              <table class="history-stock-table table">
                <thead>
                  <tr>
                    <th>Transaction Date</th>
                    <th>Supplier</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('additional_jquery')
	<script>
		$(document).ready(function() {
			let history_table = $('.history-table').DataTable({
				processing: true,
				ajax: `/product/get_transaction/${$("#product_id").val()}`,
				columns: [
					{ data: "date" },
					{ data: "customer_name" },
					{ data: "quantity" },
					{ data: "total" },
				],
			})

			let history_stock_table = $('.history-stock-table').DataTable({
				processing: true,
				ajax: `/product/get_stock_diary/${$("#product_id").val()}`,
				columns: [
					{ data: "date" },
					{ data: "supplier_name" },
					{ data: "quantity" },
					{ data: "total" },
				],
			})
		});
	</script>
@endsection
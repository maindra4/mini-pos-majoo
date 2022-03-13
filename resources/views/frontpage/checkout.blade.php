@extends('layout.frontpage.layout')

@section('content')
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
      <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-start mb-0" style="border: 0">Checkout</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="content-body">
      <section id="ecommerce-products">
        @if(session()->has('error'))
          <div class="alert alert-danger mb-1" role="alert">
            <h4 class="alert-heading">Error</h4>
            <div class="alert-body">{{ session('error') }}</div>
          </div>
        @endif
        <div class="row">
          <div class="col-3">
            <div class="card ecommerce-card">
              <div class="item-img text-center">
                <a href="#">
                  <img class="img-fluid card-img-top" src="{{ url('storage/'.$product->product_image) }}" alt="img-placeholder" />
                </a>
              </div>
              <div class="card-body text-center">
                <div class="item-wrapper">
                  <div class="item-cost">
                    <h4 class="item-price">{{ $product->product_name }}</h4>
                  </div>
                  
                  <div class="item-cost">
                    <h5 class="item-price mt-1" style="font-weight: bold">Rp. {{ number_format($product->price_sell) }}</h5>
                  </div>
                </div>
                <p class="card-text item-description mt-3">{!! $product->description !!}</p>
                <p>Stock: {{ $product->stock }}</p>
              </div>
            </div>
          </div>
          <div class="col-9">
            <div class="card">
              <div class="card-body">
                @if($product->stock > 0)
                  <form action="/checkout/process" method="post">
                    @csrf
                    <div class="row mb-1">
                      <div class="col-4">
                        <label class="form-label" for="basicInput">Quantity</label>
                        <div class="input-group">
                          <input type="number" name="quantity" class="touchspin" value="1" />
                        </div>
                      </div>
                    </div>
                    <div class="row mb-1">
                      <div class="col-6">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                          class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                        @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-6">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}"
                          class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
                        @error('phone')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                        @error('address')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <hr class="my-2">
                    <div class="row mb-2">
                      <div class="col-6">
                        <label class="form-label">Total</label>
                        <input type="hidden" id="price_sell" value="{{ $product->price_sell }}" readonly>
                        <input type="hidden" id="stock" value="{{ $product->stock }}" readonly>
                        <input type="hidden" name="product_id" value="{{ $product->id }}" readonly>
                        <input type="hidden" name="total" id="total" value="{{ $product->price_sell }}" readonly>
                        <p id="total-text" style="font-weight: bold">Rp. {{ number_format($product->price_sell) }}</p>
                      </div>
                      <div class="col-6">
                        <label class="form-label">Pay</label>
                        <input type="number" name="pay" class="form-control @error('pay') is-invalid @enderror" 
                          placeholder="Pay" value="{{ old('pay') }}">
                        @error('pay')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                        <a href="/" class="btn btn-outline-secondary waves-effect">Cancel</a>
                      </div>
                    </div>
                  </form>
                @else
                  <h3 class="text-center">Stock habis</h3>
                @endif
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection

@section('additional_jquery')
  <script>
    var touchspinValue = $('.touchspin'),
      counterMin = 1,
      counterMax = $("#stock").val();
    if (touchspinValue.length > 0) {
      touchspinValue
        .TouchSpin({
          min: counterMin,
          max: counterMax,
          buttondown_txt: feather.icons['minus'].toSvg(),
          buttonup_txt: feather.icons['plus'].toSvg()
        })
        .on('touchspin.on.startdownspin', function () {
          var $this = $(this);
          $('.bootstrap-touchspin-up').removeClass('disabled-max-min');
          if ($this.val() == counterMin) {
            $(this).siblings().find('.bootstrap-touchspin-down').addClass('disabled-max-min');
          }
          
          let total = $this.val() * $("#price_sell").val()
          let format_total = Intl.NumberFormat("de-DE", { currency: "EUR" }).format(total)

          $("#total").val(total)
          $("#total-text").text("Rp. "+format_total)
        })
        .on('touchspin.on.startupspin', function () {
          var $this = $(this);
          $('.bootstrap-touchspin-down').removeClass('disabled-max-min');
          if ($this.val() == counterMax) {
            $(this).siblings().find('.bootstrap-touchspin-up').addClass('disabled-max-min');
          }

          let total = $this.val() * $("#price_sell").val()
          let format_total = Intl.NumberFormat("de-DE", { currency: "EUR" }).format(total)

          $("#total").val(total)
          $("#total-text").text("Rp. "+format_total)
        });
    }
  </script>
@endsection
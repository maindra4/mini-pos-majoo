@extends('layout.layout')

@section('content')
	<div class="content-wrapper container-xxl p-0">
		<div class="content-header row">
			<div class="content-header-left col-md-9 col-12 mb-2">
				<div class="row breadcrumbs-top">
					<div class="col-12">
						<h2 class="content-header-title float-start mb-0">Edit Product</h2>
						<div class="breadcrumb-wrapper">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="/product">Product</a>
								</li>
								<li class="breadcrumb-item active">Edit
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
					<div class="row">
						<div class="col-12">
							@if(session()->has('error'))
                <div class="alert alert-danger mb-1" role="alert">
                  <h4 class="alert-heading">Error</h4>
                  <div class="alert-body">{{ session('error') }}</div>
                </div>
              @endif

							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Edit Product</h4>
								</div>
								<div class="card-body">
									<form class="form form-horizontal" id="form_product" method="post" 
                    action="/product/update/{{ $product->id }}" enctype="multipart/form-data">
										@csrf
										<div class="row">
											<div class="col-12">
												<div class="mb-1 row">
													<div class="col-sm-2">
														<label class="col-form-label" for="name">Product Name</label>
													</div>
													<div class="col-sm-10">
														<input id="name" class="form-control @error('product_name') is-invalid @enderror" 
															name="product_name" value="{{ old('product_name', $product->product_name) }}">
														@error('product_name')
															<div class="invalid-feedback">{{ $message }}</div>
														@enderror
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="mb-1 row">
													<div class="col-sm-2">
														<label class="col-form-label" for="category">Category</label>
													</div>
													<div class="col-sm-10">
														<select name="category_id" id="category" class="form-control @error('category_id') is-invalid @enderror select-category">
															<option value="">Choose category</option>
															@foreach($category as $row)
                                @if($row->id == $product->category_id)
                                  <option value="{{ $row->id }}" selected>{{ $row->category_name }}</option>
                                @else 
                                  <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                @endif
															@endforeach
														</select>
														@error('category_id')
															<div class="invalid-feedback">{{ $message }}</div>
														@enderror
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="mb-1 row">
													<div class="col-sm-2">
														<label class="col-form-label" for="contact-info">Description</label>
													</div>
													<div class="col-sm-10">
														<textarea name="description" class="@error('description') is-invalid @enderror">
                              {{ old('price_buy', $product->description) }}
                            </textarea>
														@error('description')
															<div class="invalid-feedback">{{ $message }}</div>
														@enderror
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="mb-1 row">
													<div class="col-sm-2">
														<label class="col-form-label" for="price_sell">Price Sell</label>
													</div>
													<div class="col-sm-10">
														<input type="number" id="price_sell" class="form-control @error('price_sell') is-invalid @enderror" 
															name="price_sell" value="{{ old('price_buy', $product->price_sell) }}">
														@error('price_sell')
															<div class="invalid-feedback">{{ $message }}</div>
														@enderror
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="mb-1 row">
													<div class="col-sm-2">
														<label class="col-form-label" for="price_buy">Price Buy</label>
													</div>
													<div class="col-sm-10">
														<input type="number" id="price_buy" class="form-control @error('price_buy') is-invalid @enderror" 
															name="price_buy" value="{{ old('price_buy', $product->price_buy) }}">
														@error('price_buy')
															<div class="invalid-feedback">{{ $message }}</div>
														@enderror
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="mb-1 row">
													<div class="col-sm-2">
														<label class="col-form-label" for="price_buy">Image</label>
													</div>
													<div class="col-sm-10">
														<input type="file" class="form-control @error('product_image') is-invalid @enderror" 
															name="product_image" accept="image/*">
														@error('product_image')
															<div class="invalid-feedback">{{ $message }}</div>
														@enderror
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="mb-1 row">
													<div class="col-sm-2">
														<label class="col-form-label" for="stock">Stock</label>
													</div>
													<div class="col-sm-10">
														<input type="number" id="stock" class="form-control @error('stock') is-invalid @enderror" 
															name="stock" value="{{ old('price_buy', $product->stock) }}">
														@error('stock')
															<div class="invalid-feedback">{{ $message }}</div>
														@enderror
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="mb-1 row">
													<div class="col-sm-2">
														<label class="col-form-label" for="status">Status</label>
													</div>
													<div class="col-sm-10">
														<div class="form-check form-check-primary form-switch">
															<input type="checkbox" class="form-check-input mt-50" id="status" 
                                name="product_status" value="active"
                                {{ (old('product_status', $product->product_status) == 'active') ? 'checked' : '' }}>
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-10 offset-sm-2">
												<button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
												<a href="/product" class="btn btn-outline-secondary waves-effect">Cancel</a>
											</div>
										</div>
									</form>
								</div>
							</div>
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
			$('.select-category').select2();

			tinymce.init({
				selector: 'textarea'
			});
		});
	</script>
@endsection
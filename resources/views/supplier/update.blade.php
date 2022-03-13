@extends('layout.layout')

@section('content')
	<div class="content-wrapper container-xxl p-0">
		<div class="content-header row">
			<div class="content-header-left col-md-9 col-12 mb-2">
				<div class="row breadcrumbs-top">
					<div class="col-12">
						<h2 class="content-header-title float-start mb-0">Edit Supplier</h2>
						<div class="breadcrumb-wrapper">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="/supplier">Supplier</a>
								</li>
								<li class="breadcrumb-item active">Add
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
									<h4 class="card-title">Edit Supplier</h4>
								</div>
								<div class="card-body">
									<form class="form form-horizontal" method="post" action="/supplier/update/{{ $supplier->id }}">
										@csrf
										<div class="row">
											<div class="col-12">
												<div class="mb-1 row">
													<div class="col-sm-2">
														<label class="col-form-label" for="name">Supplier Name</label>
													</div>
													<div class="col-sm-10">
														<input id="name" class="form-control @error('supplier_name') is-invalid @enderror" 
															name="supplier_name" placeholder="Supplier Name" value={{ old('supplier_name', $supplier->supplier_name) }}>
														@error('supplier_name')
															<div class="invalid-feedback">{{ $message }}</div>
														@enderror
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="mb-1 row">
													<div class="col-sm-2">
														<label class="col-form-label" for="contact-info">Supplier Address</label>
													</div>
													<div class="col-sm-10">
														<textarea name="supplier_address" class="form-control @error('supplier_address') is-invalid @enderror">{{ old('supplier_address', $supplier->supplier_address) }}</textarea>
														@error('supplier_address')
															<div class="invalid-feedback">{{ $message }}</div>
														@enderror
													</div>
												</div>
											</div>
											<div class="col-sm-10 offset-sm-2">
												<button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
												<a href="/supplier" class="btn btn-outline-secondary waves-effect">Cancel</a>
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
	<script></script>
@endsection
@extends('layout.layout')

@section('content')
	<div class="content-wrapper container-xxl p-0">
		<div class="content-header row">
			<div class="content-header-left col-md-9 col-12 mb-2">
				<div class="row breadcrumbs-top">
					<div class="col-12">
						<h2 class="content-header-title float-start mb-0">Update Category</h2>
						<div class="breadcrumb-wrapper">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="/category">Category</a>
								</li>
								<li class="breadcrumb-item active">Update
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
									<h4 class="card-title">Update Category</h4>
								</div>
								<div class="card-body">
									<form class="form form-horizontal" id="form_category" method="post" action="/category/update/{{ $category->id }}" enctype="multipart/form-data">
										@csrf
										<div class="row">
											<div class="col-12">
												<div class="mb-1 row">
													<div class="col-sm-2">
														<label class="col-form-label" for="name">Category Name</label>
													</div>
													<div class="col-sm-10">
														<input id="name" class="form-control @error('category_name') is-invalid @enderror" 
															name="category_name" placeholder="Category Name" value={{ old('category_name', $category->category_name) }}>
														@error('category_name')
															<div class="invalid-feedback">{{ $message }}</div>
														@enderror
													</div>
												</div>
											</div>
											<div class="col-sm-10 offset-sm-2">
												<button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
												<a href="/category" class="btn btn-outline-secondary waves-effect">Cancel</a>
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
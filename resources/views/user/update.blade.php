@extends('layout.layout')

@section('content')
	<div class="content-wrapper container-xxl p-0">
		<div class="content-header row">
			<div class="content-header-left col-md-9 col-12 mb-2">
				<div class="row breadcrumbs-top">
					<div class="col-12">
						<h2 class="content-header-title float-start mb-0">Add User</h2>
						<div class="breadcrumb-wrapper">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="/user">User</a>
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
									<h4 class="card-title">Add User</h4>
								</div>
								<div class="card-body">
									<form class="form form-horizontal" id="form_user" method="post" action="/user/update/{{ $user->id }}">
										@csrf
										<div class="row">
											<div class="col-12">
												<div class="mb-1 row">
													<div class="col-sm-2">
														<label class="col-form-label" for="name">Name</label>
													</div>
													<div class="col-sm-10">
														<input type="text" id="name" class="form-control @error('name') is-invalid @enderror" 
															name="name" placeholder="Name" value="{{ old('name', $user->name) }}">
														@error('name')
															<div class="invalid-feedback">{{ $message }}</div>
														@enderror
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="mb-1 row">
													<div class="col-sm-2">
														<label class="col-form-label" for="username">Username</label>
													</div>
													<div class="col-sm-10">
														<input type="text" id="username" class="form-control @error('username') is-invalid @enderror" 
															name="username" placeholder="Username" value="{{ old('username', $user->username) }}">
														@error('name')
															<div class="invalid-feedback">{{ $message }}</div>
														@enderror
													</div>
												</div>
											</div>
											<div class="col-sm-10 offset-sm-2">
												<button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
												<a href="/user" class="btn btn-outline-secondary waves-effect">Cancel</a>
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
    $("#generate").on('click', function() {
      let length = 8
      let chars = "23456789ABCDEFGHJKLMNPQRSTUVWXYZ";
      var result = '';
      for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];

      $("#password").val(result)
    })
  </script>
@endsection
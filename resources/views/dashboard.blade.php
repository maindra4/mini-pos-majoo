@extends('layout.layout')

@section('content')
	<div class="content-wrapper container-xxl p-0">
		<div class="content-header row">
			<div class="content-header-left col-md-9 col-12 mb-2">
				<div class="row breadcrumbs-top">
					<div class="col-12">
						<h2 class="content-header-title float-start mb-0">Dashboard</h2>
						<div class="breadcrumb-wrapper">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active">
									Dashboard
								</li>
							</ol>
							{{-- <ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Home</a>
								</li>
								<li class="breadcrumb-item"><a href="#">Layouts</a>
								</li>
								<li class="breadcrumb-item active">Layout Empty
								</li>
							</ol> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="content-body">
			<div class="row">
				<div class="col-12">
					<div class="alert alert-primary" role="alert">
						<div class="alert-body">
							<strong>Info:</strong> This layout can be useful for getting started with empty content section. Please check
							the&nbsp;<a class="text-primary" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/documentation-layout-empty.html" target="_blank">Layout empty documentation</a>&nbsp; for more details.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
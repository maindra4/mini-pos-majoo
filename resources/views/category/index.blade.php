@extends('layout.layout')

@section('content')
<div class="content-wrapper container-xxl p-0">
  <div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-start mb-0">Category</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active">
                Category
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
        <section id="product">
					<div class="row">
						<div class="col-12">
              <a href="/category/add" class="btn btn-primary mb-1">Add Category</a>

              @if(session()->has('success'))
                <div class="alert alert-success mb-1" role="alert">
                  <h4 class="alert-heading">Success</h4>
                  <div class="alert-body">{{ session('success') }}</div>
                </div>
              @endif

							<div class="card px-2 py-2">
								<table class="category-table table">
									<thead>
										<tr>
                      <th>Nama</th>
                      <th>Action</th>
                    </tr>
									</thead>
                  <tbody></tbody>
								</table>
							</div>
						</div>
					</div>
				</section>
      </div>
    </div>
  </div>
</div>
@endsection

@section('additional_jquery')
	<script>
		$(document).ready(function() {
			let category_table = $('.category-table').DataTable({
				processing: true,
				ajax: "category/get_data",
				columns: [
					{ data: "category_name" },
					{ data: "id" }
				],
				columnDefs: [
					{
						// Actions
						targets: -1,
						title: 'Actions',
						orderable: false,
						render: function (data, type, full, meta) {
							return (
								'<div class="d-inline-flex">' +
									'<a class="dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
										feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
									'</a>' +
									'<div class="dropdown-menu dropdown-menu-end">' +
										`<a href="/category/update/${data}" class="dropdown-item">` +
											feather.icons['edit'].toSvg({ class: 'me-50 font-small-4' }) +
										'Update</a>' +
										`<a class="dropdown-item delete-record" data-id="${data}">` +
											feather.icons['trash-2'].toSvg({ class: 'me-50 font-small-4' }) +
										'Delete</a>' +
									'</div>' +
								'</div>'
							);
						}
					}
				],
				search: {
					return: true
				}
			})

			$('.category-table tbody').on('click', '.delete-record', function () {
				let id = $(this).data("id")

				Swal.fire({
					title: 'Delete category?',
					text: "Are you sure to delete this category?",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Yes, delete it!',
					customClass: {
						confirmButton: 'btn btn-primary',
						cancelButton: 'btn btn-outline-danger ms-1'
					},
					buttonsStyling: false
				}).then(function (result) {
					if (result.value) {
						$.ajax({
							url: `category/delete/${id}`,
							dataType: 'json',
							success: function(callback) {
								if(callback.status) {
									Swal.fire({
										icon: 'success',
										title: 'Deleted!',
										text: callback.message,
										customClass: {
											confirmButton: 'btn btn-success'
										}
									}).then(function (result) {
										if(result.value) {
											location.reload()
										}
									});
								} else {
									Swal.fire({
										icon: 'danger',
										title: 'Deleted!',
										text: callback.message,
										customClass: {
											confirmButton: 'btn btn-danger'
										}
									});
								}
							}
						})
					}
				});
			});
		});
	</script>
@endsection
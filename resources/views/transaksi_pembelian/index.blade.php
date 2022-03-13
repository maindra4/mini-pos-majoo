@extends('layout.layout')

@section('content')
<div class="content-wrapper container-xxl p-0">
  <div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-start mb-0">Transaksi Pembelian</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active">
                Transaksi Pembelian
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
        <section id="trx">
					<div class="row">
						<div class="col-12">
							<div class="card px-2 py-2">
								<table class="trx-table table">
									<thead>
										<tr>
                      <th>Nama</th>
                      <th>Tanggal</th>
                      <th>Total Pembelian</th>
                      <th>Total Item</th>
                      <th>Status</th>
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
			let trx_table = $('.trx-table').DataTable({
				processing: true,
				serverSide: true,
				ajax: "transaksi_pembelian/get_data",
				columns: [
					{ data: "name" },
					{ data: "date" },
					{ data: "total_selling" },
					{ data: "total_item" },
					{ data: "status" },
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
										`<a href="/transaksi_pembelian/${data}" class="dropdown-item">` +
											feather.icons['file-text'].toSvg({ class: 'me-50 font-small-4' }) +
										'Detail</a>' +
									'</div>' +
								'</div>'
							);
						}
					}
				]
			})
		});
	</script>
@endsection
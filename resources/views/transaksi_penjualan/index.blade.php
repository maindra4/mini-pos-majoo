@extends('layout.layout')

@section('content')
<div class="content-wrapper container-xxl p-0">
  <div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-start mb-0">Transaksi Penjualan</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active">
                Transaksi Penjualan
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
                      <th>Total Penjualan</th>
                      <th>Total Item</th>
                      <th>Status</th>
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
				ajax: "transaksi_penjualan/get_data",
				columns: [
					{ data: "name" },
					{ data: "date" },
					{ data: "total_selling" },
					{ data: "total_item" },
					{ data: "status" }
				],
				columnDefs: [
          {
            // Label
            targets: -1,
            render: function (data, type, full, meta) {
              var $status_number = full['status'];
              var $status = {
                'success': { title: 'Success', class: ' badge-light-success' },
                'failed': { title: 'Failed', class: ' badge-light-danger' },
              };
              if (typeof $status[$status_number] === 'undefined') {
                return data;
              }
              return (
                '<span class="badge rounded-pill ' +
                $status[$status_number].class +
                '">' +
                $status[$status_number].title +
                '</span>'
              );
            }
          },
				]
			})
		});
	</script>
@endsection
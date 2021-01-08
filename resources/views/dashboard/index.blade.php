@extends('layouts.main_layout')
@section('js-top')
<script type="text/javascript" src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>
<script src="{{ asset('global_assets/js/demo_pages/datatables_extension_buttons_init.js') }}"></script>
<script src="{{ asset('global_assets/js/jquery-number/jquery.number.js') }}"></script>
<script src="{{ asset('global_assets/datatable/jszip.min.js') }}"></script>
<script src="{{ asset('global_assets/datatable/pdfmake.min.js') }}"></script>
<script src="{{ asset('global_assets/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('global_assets/datatable/buttons.html5.min.js') }}"></script>
<script type="text/javascript">

	$(".delete-data").click(function(){
		
		swal.fire({
			title: "Yakin ingin menghapus data ini ?",
			icon: "warning",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then(isConfirm => {
			console.log('confim', isConfirm);
			if (isConfirm.value) {
				var id = $(this).attr('data-id');
				
				$.get('{{ url('/delete_data_peserta/') }}/'+id+'', function(data, status){
					
					
					swal.fire("Terhapus!", "Data Berhasil dihapus !", "success").then(function(){
						location.reload();
					})

					setTimeout(
						function() {
							location.reload();
						}, 2000);
					

				});

			} else {
				swal.fire("Batal", "Data Aman.", "error");
			}
		});
		console.log('val',val);
	})


	$(function() {

		



		var table =  $('#peserta-table').DataTable({
			// processing: true,
			// serverSide: true,
			// dom: 'Blfrtip',
	// 		buttons: [
    //     'selectAll',
    //     'selectNone'
    // ],
			// lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
			buttons: {
				dom: {
					button: {
						className: 'btn btn-light'
					}
				},
				buttons: [
				
				{extend: 'copy'},
				{extend: 'csv'},
				{extend: 'excel',},
				{extend: 'pdf'},
				{extend: 'print'}
				]
			},
			

		});

		
	});
</script>
@endsection
@section('content')
<div class="card">
	<div class="card-header bg-success header-elements-inline">
		<h6 class="card-title text-uppercase font-weight-bold mb-0">Dashboard Management Aset</h6>

		<div class="header-elements">
			
		</div>
	</div>

	<!-- Action toolbar -->
	<!-- /action toolbar -->
	<br>
	<div class="col-md-12">
		<div class="row">
			{{-- <div class="col-md-12"> --}}
				<div class="col-sm-6 col-xl-3">
					<div class="card card-body">
						<div class="media">
							<div class="mr-3 align-self-center">
								<i class="icon-bookmark icon-3x text-warning-400"></i>
							</div>
							
							<div class="media-body text-right">
								<h2 class="font-weight-semibold mb-0">{{$hgu}}</h2>
								<span class="text-uppercase font-weight-bold mb-0">TOTAL DATA AREAL HGU</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xl-3">
					<div class="card card-body">
						<div class="media">
							<div class="mr-3 align-self-center">
								<i class="icon-books icon-3x text-success-400"></i>
							</div>
							
							<div class="media-body text-right">
								<h2 class="font-weight-semibold mb-0">{{$hgb}}</h2>
								<span class="text-uppercase font-weight-bold mb-0">TOTAL DATA AREAL HGB </span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xl-3">
					<div class="card card-body">
						<div class="media">
							<div class="mr-3 align-self-center">
								<i class="icon-notification2 icon-3x text-info-400"></i>
							</div>
							
							<div class="media-body text-right">
								<h3 class="font-weight-semibold mb-0">{{$warning_count}}</h3>
								<span class="text-uppercase font-weight-bold mb-0">TOTAL ASET AKAN BERAKHIR</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xl-3">
					<div class="card card-body">
						<div class="media">
							<div class="mr-3 align-self-center">
								<i class="icon-sync icon-3x text-warning-400"></i>
							</div>
							
							<div class="media-body text-right">
								<h3 class="font-weight-semibold mb-0">{{$proses}}</h3>
								<span class="text-uppercase font-weight-bold mb-0">ASET SEDANG Di PROSES</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		{{-- </div> --}}	
	</div>
</div>

<br>
<div class="card">
	<div class="row">
		<div class="col-md-12">
			<div class="card border-top-3 border-top-success border-bottom-3 border-bottom-success border-left-3 border-left-success-400 border-right-3 border-right-success-400 rounded-0">
				<div class="card-header text-uppercase font-weight-bold mb-0">
					DOKUMEN ASET YANG AKAN BERAKHIR
				</div>
				<div class="card-body">
					<table id="peserta-table" class="table datatable-basic table-striped table-bordered">
						<thead>
							<tr>
								<th>Jenis Dokumen</th>
								<th>Nama Dokumen</th>
								<th>No Sertifikat</th>
								<th>Lokasi</th>
								<th>Nama Desa</th>
								<th>Kecamatan</th>
								<th>Kabupaten</th>
								<th>Luas Areal</th>
								<th>Tanggal Awal</th>
								<th>Tanggal Expired</th>
								<th>Status</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($warning as $key=> $data)
							<tr>
								
								<td><a class="btn bg-success" data-toggle="modal" data-target="#modal_theme_success"><i class="icon-file-pdf"></i> {{$data->kategori->nama}}</a></td>
								<td>{{$data->nama}}</td>
								<td>{{$data->no_sertifikat}}</td>
								<td>{{$data->nama_lokasi}}</td>
								<td>{{$data->nama_desa}}</td>
								<td>{{$data->kecamatan}}</td>
								<td>{{$data->kabupaten}}</td>
								<td>{{$data->luas_areal}}</td>
								<td>{{date('d-M-Y',strtotime($data->tanggal_awal))}}</td>
								<td>{{date('d-M-Y',strtotime($data->tanggal_akhir))}}</td>
								<td>
									<?php 
									$dbDate = \Carbon\Carbon::parse(date('d-M-Y',strtotime($data->tanggal_akhir)));
									$diffYears = \Carbon\Carbon::now()->diffInYears($dbDate);
									$dt = \Carbon\Carbon::now();

											 // echo $diffYears;
									if($diffYears < 2){
										echo "<b class=\" btn btn-warning rounded-round\">Akan Berakhir</b>";
									}elseif ($dbDate < $dt) {
										echo "<b class=\" btn btn-danger rounded-round\">non-aktif</b>";
									}
									
									?>
								</td>
								<div id="modal_theme_success" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header bg-success">
												<h6 class="modal-title">{{$data->kategori->nama}} {{$data->no_sertifikat}} {{$data->nama_lokasi}}</h6>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>

											<div class="modal-body">
												<div id="no-pdf" style="display: none; text-align: center">Maaf, PDF tidak ditemukan.</div>
												<div id="filePDF" class="span9 fileview">
													<div class="addthis_sharing_toolbox"></div>
													<object data= "{{ url('/view-attachment/preview') }}/{{ $data->path_file }}" type="application/pdf" width="100%" height="600px" onload="loaded()" onerror="notfoundpdf()">
													</object>
												</div>
											</div>
										</div>
									</div>
								</div>
							</tr>
							@endforeach
						</tbody>
						
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


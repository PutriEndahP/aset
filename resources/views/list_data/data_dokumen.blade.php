@extends('layouts.main_layout')
@section('js-bottom')
<script type="text/javascript" src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>
<script src="{{ asset('global_assets/js/demo_pages/datatables_extension_buttons_init.js') }}"></script>
<script src="{{ asset('global_assets/datatable/jszip.min.js') }}"></script>
<script src="{{ asset('global_assets/datatable/pdfmake.min.js') }}"></script>
<script src="{{ asset('global_assets/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('global_assets/datatable/buttons.html5.min.js') }}"></script>
<!-- modal -->
<script src="{{ asset('global_assets/js/plugins/notifications/bootbox.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<!-- <script src="{{ asset('js/app.js')}}"></script> -->
<script src="{{ asset('global_assets/js/demo_pages/components_modals.js')}}"></script>
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
			columnDefs: [
				// { width: 500, targets: 7 },
				// { width: 200, targets: 1 },
				// { width: 50, targets: 2 },
				// { width: 10, targets: 3 },
				// { width: 5, targets: 4 },
				// { width: 100, targets: 5 }
			],
		

		});

	
	});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#id_bagian').select2({placeholder: 'Pilih Jenis Dokumen'});

		$('#id_bagian').change(function(){
			var id_dokumen = $(this).val();
			// alert('aku di click '+id_dokumen);
			location.href="{{ url('/list_data') }}/"+id_dokumen+"";

		})
	})
</script>
<script type="text/javascript">
	$('.format-angka').number( true, 0, ',', '.'  );s
</script>
@endsection
@section('content')

<div class="row">
    <div class="col-md-3">
        <div class=" card">
            <div class="card-body">
               <form action="" class="form">
                    <legend>Pilih Jenis Dokumen</legend>
                    <div class="col-md-12">
                    <div class="form-group">
                        <select required name="id_bagian" class="js-states form-control bagian" id="id_bagian">
                            <option value=""></option>
                   			@foreach($kategori_dokumen as $kategori)
									<option value="{{ $kategori->id }}"
										{{ isset($detail_data) ? $detail_data->id_kategori == $kategori->id ? 'selected' : '' : '' }}
										value="{{ $kategori->id_kategori}}">{{ $kategori->nama}}  </option>
										}
									@endforeach
								</select>
                        
                            <option> 
                            </option>
              
                </select>
                        {{-- <input type="text" class="form-control" id="sds" name="instansi" value="{{ old('instansi') }}" required placeholder="PILIH JENIS DOKUMEN" required> --}}
                    </div>
                    </div>
			   </form>
			   
            </div>
        </div>
	</div>
	
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header bg-transparent header-elements-inline">
				<h6 class="card-title">DOKUMEN ASET</h6>

				<div class="header-elements">

				</div>
				@if(Auth::user()->id_role == 3)
				<div class="col-sm-2 col-md-1">		
				<a href="{{ url('/forminput') }}" class="btn btn-success">Tambah Data<i class="icon-file-plus"></i></a>
			</div>
			@endif
			</div>

			<div class="card-body">
						<table id="peserta-table" class="table datatable-basic table-striped table-bordered">
							<thead>
								<tr>
									<th>Jenis Dokumen</th>
									<th>Nama HGU/HGB</th>
                                    <th>No Sertifikat</th>
                                    <th>Lokasi</th>
                                    <th>Nama Desa</th>
                                    <th>Kecamatan</th>
                                    <th>Kabupaten</th>
                                    <th>Luas Areal</th>
                                    <th>Tanggal Awal</th>
                                    <th>Tanggal Expired</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
									
								
								</tr>
							</thead>
							<tbody>
								@foreach($list_data as $key=> $data)
									<tr>

										<td><a class="btn bg-success" data-toggle="modal" data-target="#modal_theme_success_{{ $data->id }}"><i class="icon-file-pdf"></i> {{$data->kategori->nama}}</a></td>
										<td>{{$data->nama}}</td>
										<td>{{$data->no_sertifikat}}</td>
										<td>{{$data->nama_lokasi}}</td>
										<td>{{$data->nama_desa}}</td>
										<td>{{$data->kecamatan}}</td>
										<td>{{$data->kabupaten}}</td>
										<td><span class="format-angka">{{$data->luas_areal}}</span> {!! $data->satuan_area == 1 ? 'Ha' : 'M<sup>2</sup>' !!}</td>
										<td>{{date('d-M-Y',strtotime($data->tanggal_awal))}}</td>
										<td>{{date('d-M-Y',strtotime($data->tanggal_akhir))}}</td>
										<td>
											<?php 
											 $dbDate = \Carbon\Carbon::parse(date('d-M-Y',strtotime($data->tanggal_akhir)));
											 $diffYears = \Carbon\Carbon::now()->diffInYears($dbDate);
											 $dt = \Carbon\Carbon::now();

											 // echo $diffYears;
											 if($diffYears < 2){
											 	if ($data->is_reviewed == 2){
											 		echo "<b style=\" color:yellow;\">Sedang Di Proses</b>";
											 	}else{
											 		echo "<b style=\" color:orange;\">Akan Berakhir</b>";
											 	}

												}elseif ($dbDate < $dt) {
													?>
													@if(count($data->review_count) > 0)
													<a href="{{ url('/eviden') }}/{{ $data->id }}" class=" btn btn-outline-danger" style=" color:black">Sedang di Proses</a>
													@else
<a href="{{ url('/eviden') }}/{{ $data->id }}" class=" btn btn-outline-danger" style=" color:black">Non-aktif</a>
													@endif
												 	
												 	<?php
												}else{
												 	echo "<b class=\" btn btn-outline-success\" style=\" color:black;\">Aktif</b>";
												}

											 ?>
										</td>

										<td class="text-center">
											<div class="btn-group btn-group-xs">
												<a href="{{ url('/forminput') }}/{{ $data->id }}"  data-original-title="Untuk Mengedit Data"  class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top"><i class="icon-pencil5"></i></a>                                                
												<a href="{{ url('/detail') }}/{{ $data->id }}" data-original-title="Untuk Melihat Data"  class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top"><i class="icon-file-stats2"></i></a>   														
											</div>
										</td>
										
								<div id="modal_theme_success_{{ $data->id }}" class="modal fade modal-full" tabindex="-1">
									<div class="modal-dialog modal-full">
										<div class="modal-content">
											<div class="modal-header bg-success">
												<h6 class="modal-title">{{$data->kategori->nama}} {{$data->no_sertifikat}} {{$data->nama_lokasi}}</h6>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>

											<div class="modal-body">
												<div id="no-pdf" style="display: none; text-align: center">Maaf, PDF tidak ditemukan.</div>
												<img id="loading-icon" src="/assets/site/images/loading-icon.gif" style="margin: auto; display: none">
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


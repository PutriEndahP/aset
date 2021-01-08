@extends('layouts.main_layout')
@section('js-top')
<script src="{{ asset ('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset ('global_assets/js/demo_pages/form_select2.js') }}"></script>
<script src="{{ asset ('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
<script src="{{ asset ('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>
<script src="{{ asset ('global_assets/js/plugins/pickers/anytime.min.js') }}"></script>
<script src="{{ asset ('global_assets/js/plugins/pickers/pickadate/picker.js') }}"></script>
<script src="{{ asset ('global_assets/js/plugins/pickers/pickadate/picker.date.js') }}"></script>
<script src="{{ asset ('global_assets/js/plugins/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{ asset ('global_assets/js/plugins/pickers/pickadate/legacy.js') }}"></script>
<script src="{{ asset ('global_assets/js/plugins/notifications/jgrowl.min.js') }}"></script>
<script src="{{ asset ('global_assets/js/demo_pages/picker_date.js')}}"></script>
<script src="{{ asset ('global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js') }}"></script>
<script src="{{ asset ('global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
<script src="{{ asset ('global_assets/js/plugins/uploaders/fileinput/fileinput.min.js') }}"></script>
<script src="{{ asset ('global_assets/js/demo_pages/uploader_bootstrap.js') }}"></script>
<script src="{{ asset('global_assets/js/jquery-number/jquery.number.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

<script type="text/javascript">
	$('.angka').number( true, 0, ',', '.'  );
</script>
@endsection
@section('content')



<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header bg-success text-white header-elements-inline">
				<h6 class="card-title">DETAIL</h6>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>

			<div class="card-body">
				<table class="detail-view table table-condensed" id="yw0">
					<tbody>
						<tr><th>No Sertifikat</th>
							<td>{{$info->no_sertifikat}}</td>
						</tr>
						<tr><th>Nama Kebun</th>
							<td>{{$info->nama}}</td>
						</tr>
						<tr><th>Lokasi</th>
							<td>{{$info->nama_lokasi}}</td>
						</tr>
						<tr><th>Nama Desa</th>
							<td>{{$info->nama_desa}}</td>
						</tr>
						<tr><th>Kecamatan</th>
							<td>{{$info->kecamatan}}</td>
						</tr>
						<tr><th>Kabupaten</th>
							<td>{{$info->kabupaten}}</td>
						</tr>
						<tr><th>Luas Areal</th>
							<td><span class="angka">{{$info->luas_areal}}</span> {!! $info->satuan_area == 1 ? 'Ha' : 'M<sup>2</sup>' !!}</td>
						</tr>
						<tr><th>Tanggal Awal</th>
							<td> {{date('d-M-Y',strtotime($info->tanggal_awal))}}</td>
						</tr>
						<tr><th>Tanggal Expired</th>
							<td> {{date('d-M-Y',strtotime($info->tanggal_akhir))}}</td>
						</tr>
						<tr><th>Status</th>
							<td> <?php 
							$dbDate = \Carbon\Carbon::parse(date('d-M-Y',strtotime($info->tanggal_akhir)));
							$diffYears = \Carbon\Carbon::now()->diffInYears($dbDate);
							$dt = \Carbon\Carbon::now();

											 // echo $diffYears;
							if($diffYears < 2){
								echo "<b style=\" color:orange;\">Akan Berakhir</b>";
							}elseif ($dbDate < $dt) {
								echo "<b style=\" color:red;\">Non-aktif</b>";
							}else{
								echo "<b style=\" color:green;\">Aktif</b>";
							}
							
							?></td>
						</tr>
						<tr><th>File Sertifikat</th>
							<td><a class="btn bg-success" data-toggle="modal" data-target="#modal_theme_success_{{ $info->id }}"><i class="icon-file-pdf"></i> {{$info->kategori->nama}}</a></td>
						</tr>
						<tr><th>File Peta Bidang</th>
							<td><a class="btn bg-warning" data-toggle="modal" data-target="#modal_theme_warning_{{ $info->id }}"><i class="icon-location4"></i> {{$info->kategori->nama}}</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div id="modal_theme_success_{{ $info->id }}" class="modal fade modal-full" tabindex="-1">
		<div class="modal-dialog modal-full">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h6 class="modal-title">{{$info->kategori->nama}} {{$info->no_sertifikat}} {{$info->nama_lokasi}}</h6>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<div id="no-pdf" style="display: none; text-align: center">Maaf, PDF tidak ditemukan.</div>
					<img id="loading-icon" src="/assets/site/images/loading-icon.gif" style="margin: auto; display: none">
					<div id="filePDF" class="span9 fileview">
						<div class="addthis_sharing_toolbox"></div>
						<object data= "{{ url('/view-attachment/preview') }}/{{ $info->path_file }}" type="application/pdf" width="100%" height="600px" onload="loaded()" onerror="notfoundpdf()">
						</object>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="modal_theme_warning_{{ $info->id }}" class="modal fade modal-full" tabindex="-1">
		<div class="modal-dialog modal-full">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h6 class="modal-title">PETA BIDANG</h6>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<div id="no-pdf" style="display: none; text-align: center">Maaf, PDF tidak ditemukan.</div>
					<img id="loading-icon" src="/assets/site/images/loading-icon.gif" style="margin: auto; display: none">
					<div id="filePDF" class="span9 fileview">
						<div class="addthis_sharing_toolbox"></div>
						<object data="{{ url('/view-attachment/preview') }}/{{ $info->path_file_peta }}" type="application/pdf" width="100%" height="600px" onload="loaded()" onerror="notfoundpdf()">
						</object>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="card">
		<div class="card-header header-elements-inline bg-teal-400 ">
			<a href="#collapse-link" class=" font-weight-semibold " data-toggle="collapse" aria-expanded="true">
				<h6 class="card-title text-white"><i class="icon-envelop4"></i> HISTORY PERPANJANGAN</h6>

			</a>
			<div class="header-elements">

			</div>
		</div>
		<div class="card-body">
			<div class="list-feed list-feed-solid">
				<div class="list-feed-item border-warning-400">
					<a href="#"></a>
				</div>

				<div class="list-feed-item border-info-400">
					<a href="#"></a> 
				</div>

				<div class="list-feed-item border-pink-400">
					<strong></strong>  <a href="#"></a>
				</div>

				<div class="list-feed-item border-slate-600">
					<a href="#"></a><strong></strong>, <strong></strong><strong></strong>
				</div>

				<div class="list-feed-item border-teal-400">
				</div>

			</div>
		</div>
	</div>
</div>




@endsection


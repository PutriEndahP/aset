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
<script src="{{ asset ('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset ('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset ('global_assets/js/demo_pages/datatables_basic.js') }}"></script>
@endsection
@section('content')
<div class="row">
		<div class="col-md-6">
								<div class="card">
									<ul class="nav nav-tabs nav-tabs-highlight mb-0">
									<li class="nav-item"><a href="#bordered-tab1" class="nav-link active" data-toggle="tab">
											Data Kategori
									</a></li>
								</ul>

								<div class="tab-content card card-body border-top-0 rounded-top-0 mb-0">
									<div class="tab-pane fade show active" id="bordered-tab1">
								<div class="card-body">
									<legend class="font-weight-semibold text-uppercase font-size-sm">
											<i class="icon-reading mr-2"></i>
											Tabel Kategori
											<a class="float-right text-default" data-toggle="collapse" data-target="#demo2">
												<i class="icon-circle-down2"></i>
											</a>
										</legend>
								</div>
								<table class="table datatable-basic table-bordered table-striped table-hover">
						<thead>
							<tr>

								<th>No</th>
								<th>Nama Kategori</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($kategori_dokumen as $key=> $data)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$data->nama}}</td>
								<td style="text-align: center;">
										
										<a href="{{ url('/kategori') }}/{{ $data->id }}">
											<button class="btn btn-primary"><i class="icon-pencil7"></i></button>
										</a>
										<!-- <button class="btn btn-primary">Ubah Password</button> -->
										<button class="btn btn-danger"><i class="icon-trash"></i></button>
									</td>
							</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


		<div class="col-md-6">
				<div class="card">
					<ul class="nav nav-tabs nav-tabs-highlight mb-0">
									<li class="nav-item"><a href="#bordered-tab1" class="nav-link active" data-toggle="tab">
											Input Kategori
									</a></li>
								</ul>

								<div class="tab-content card card-body border-top-0 rounded-top-0 mb-0">
									<div class="tab-pane fade show active" id="bordered-tab1">
									
					<div class="card-body">
								<form 
								@if(isset($detail_kategori))
								action="{{ url('/update_kategori') }}" 
								@else
								 action="{{ url('/insertkategori') }}" 
								@endif
									data-parsley-validate=""
									method="post">
									 @csrf
									 <input type="hidden" name="is_update" value="{{ isset($detail_kategori) ? $detail_kategori->id : ''}}">
									 <input type="hidden" name="id_kategori" value="{{ isset($detail_kategori) ? $detail_kategori->id : ''}}">
									<fieldset>
										<legend class="font-weight-semibold text-uppercase font-size-sm">
											<i class="icon-reading mr-2"></i>
											
											@if(isset($detail_kategori))
												Update Data kategori
											@else
												Data kategori
											@endif
											<a class="float-right text-default" data-toggle="collapse" data-target="#demo2">
												<i class="icon-circle-down2"></i>
											</a>
										</legend>

									<div class="form-group">
											<label>Nama Kategori:</label>
												<input 
													type="text" 
													name="nama" 
													class="form-control" 
													placeholder=""
													required=""
													value="{{ isset($detail_kategori) ? $detail_kategori->nama : '' }}" 
													data-parsley-required-message="Nama Kategori tidak Boleh Kosong!"  
													/>
										</div>
						
									<div class="text-right">
										<button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
										<a href=""><button type="button" class="btn btn-default">Cancel <i class="icon-arrow-left8 ml-2"></i></button></a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>

@endsection


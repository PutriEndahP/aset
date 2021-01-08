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

<script type="text/javascript">
	
</script>
@endsection
@section('content')

<form 
@if(!isset($detail_data))
action="{{ URL::to('/save_aset') }}"
@else
action="{{ URL::to('/update')}}" 
@endif
data-parsley-validate=""
enctype="multipart/form-data"
method="post">
<div class="row">
	<div class="col-md-6">
		<div class="card">
			@csrf
			<div class="card-body">
				

				<input type="hidden" name="is_update" value="{{ isset($detail_data) ? $detail_data->id : ''}}">
				<input type="hidden" name="id_aset" value="{{ isset($detail_data) ? $detail_data->id : ''}}">
				<fieldset>
					<legend class="font-weight-semibold text-uppercase font-size-sm">
						<i class="icon-reading mr-2"></i>
						@if(isset($detail_data))
						UPDATE DATA ASET
						@else
						INPUT DATA ASET
						@endif
						
						<a class="float-right text-default" data-toggle="collapse" data-target="#demo2">
							<i class="icon-circle-down2"></i>
						</a>
					</legend>

					<div class="collapse show" id="demo1">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Jenis Dokumen:</label>
									<select id="dokumen" name="id_dokumen" data-placeholder="Pilih jenis" class="form-control select-search" data-fouc>
										<option></option>
										@foreach($kategori_dokumen as $kategori)
										<option value="{{ $kategori->id }}"
											{{ isset($detail_data) ? $detail_data->id_dokumen == $kategori->id ? 'selected' : '' : '' }}
											> {{ $kategori->nama }} </option>
										}
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama HGU/HGB:</label>
									<input 
									type="text" 
									name="nama" 
									class="form-control" 
									placeholder=""
									required=""
									value="{{ isset($detail_data) ? $detail_data->nama : '' }} " 
									data-parsley-required-message="Lokasi tidak Boleh Kosong!"  
									/>
								</div>
							</div>
						</div>
						<legend class="font-weight-semibold text-uppercase font-size-sm">
							<i class="icon-attachment2 mr-2"></i>
							Lokasi Areal
							<a href="#" class="float-right text-default" data-toggle="collapse" data-target="#demo1">
								<i class="icon-circle-down2"></i>
							</a>
						</legend>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Lokasi:</label>
									<input 
									type="text" 
									name="nama_lokasi" 
									class="form-control" 
									placeholder=""
									required=""
									value="{{ isset($detail_data) ? $detail_data->nama_lokasi : '' }} " 
									data-parsley-required-message="Lokasi tidak Boleh Kosong!"  
									/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Desa:</label>
									<input 
									type="text" 
									name="nama_desa" 
									class="form-control" 
									placeholder=""
									value="{{ isset($detail_data) ? $detail_data->nama_desa : '' }}" 
									required="" 
									data-parsley-required-message="Nama lokasi tidak Boleh Kosong!"  
									/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Kecamatan:</label>
									<input 
									type="text" 
									name="kecamatan" 
									class="form-control" 
									placeholder=""
									required=""
									value="{{ isset($detail_data) ? $detail_data->kecamatan : '' }}"  
									data-parsley-required-message="Nama Lokasi tidak Boleh Kosong!"  
									/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Kabupaten:</label>
									<input 
									type="text" 
									name="kabupaten" 
									class="form-control" 
									placeholder=""
									required=""
									value="{{ isset($detail_data) ? $detail_data->kabupaten : '' }}"  
									data-parsley-required-message="Nama Kabupaten tidak Boleh Kosong!"  
									/>
								</div>
							</div>
						</div>
					</div>
				</fieldset>				

				<div class="text-left">
					<button type="submit" class="btn btn-primary">Submit Data <i class="icon-paperplane ml-2"></i></button>
				</div>

			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>No.Sertifikat HGU/HGB:</label>
							<input 
							type="text" 
							name="no_sertifikat" 
							class="form-control" 
							placeholder=""
							required=""
							value="{{ isset($detail_data) ? $detail_data->no_sertifikat : '' }}"  
							data-parsley-required-message="No. sertifikat tidak Boleh Kosong!"  
							/>
						</div>
					</div>
					
					
					<div class="col-md-6">
						<label>Luas Areal (HA):</label>
						<div class="row">
							<div class="col-md-6">
								<select id="satuan" name="satuan_area" data-placeholder="Jenis Luasan" class="form-control select-search" data-fouc>
									<option></option>
									
									<option value="1" {{ isset($detail_data) ? $detail_data->satuan_area == 1 ? 'selected' : '' : '' }}>Ha</option>
									<option value="2" {{ isset($detail_data) ? $detail_data->satuan_area == 2 ? 'selected' : '' : '' }}><p>M<sup>2</sup></p></option>
									
								</select>
							</div>

							
							<div class="col-md-6">
								<input 
								type="text" 
								name="luas_areal" 
								class="form-control" 
								placeholder=""
								required=""
								value="{{ isset($detail_data) ? $detail_data->luas_areal : '' }}"  
								data-parsley-required-message="Luas Areal tidak Boleh Kosong!"  
								/>
							</div>
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Tanggal Dokumen:</label>
							<div class="input-group">
								<span class="input-group-prepend">
									<span class="input-group-text"><i class="icon-calendar22"></i></span>
								</span>
								<input type="text"
								name="tanggal_awal"
								class="form-control pickadate-accessibility"
								value="{{ isset($detail_data) ? date('m/d/Y', strtotime($detail_data->tanggal_awal)): '' }}"  >
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Tanggal Expired:</label>
							<div class="input-group">
								<span class="input-group-prepend">
									<span class="input-group-text"><i class="icon-calendar22"></i></span>
								</span>
								<input type="text" 
								name="tanggal_akhir" 
								class="form-control pickadate-accessibility" 
								value="{{ isset($detail_data) ? date('m/d/Y', strtotime($detail_data->tanggal_akhir)): '' }}"  >
							</div>
						</div>
					</div>
				</div>
		<!-- 	<div class="form-group">
				<label>Keterangan :</label>
				<textarea rows="3" cols="3" class="form-control" placeholder="Keterangan"></textarea>
			</div>
		-->
		<legend class="font-weight-semibold text-uppercase font-size-sm">
			<i class="icon-attachment2 mr-2"></i>
			File Lampiran
			<a href="#" class="float-right text-default" data-toggle="collapse" data-target="#demo1">
				<i class="icon-circle-down2"></i>
			</a>
		</legend>

				<div class="form-group row">
					<label class="col-lg-3 col-form-label font-weight-semibold">File Sertifikat:</label>
						<input 
						type="file" 
						name="file" 
						class="file-input"
						multiple="multiple" 
						placeholder="Icon Apps"
						required
						
						data-parsley-required-message="File tidak boleh kosong !"  
						/>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label font-weight-semibold">File Peta Bidang:</label>
						<input 
						type="file" 
						name="file_peta" 
						class="file-input"
						multiple="multiple" 
						placeholder="Icon Apps"

						/>
				</div>
				
							</div>
						</div>
						</div>					
					</div>
				</div>
			</form>

@endsection


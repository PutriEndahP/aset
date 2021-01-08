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
				<div class="col-md-6">
				<div class="card">

						<div class="card-header header-elements-inline bg-teal-400 ">
							<a href="#collapse-link" class=" font-weight-semibold " data-toggle="collapse" aria-expanded="true">
								<h6 class="card-title text-white"><i class="icon-envelop4"></i> UPLOAD FILE EVIDEN PERPANJANGAN</h6>

							</a>
							<div class="header-elements">

							</div>
						</div>
				<div class="card-body">
					<form 
					@if(!isset($detail_data))
					action="{{ URL::to('/save') }}"
					@else
					action="{{ URL::to('')}}" 
					@endif
					data-parsley-validate=""
					enctype="multipart/form-data"
					method="post">
					 @csrf
					 <input type="hidden" name="id_aset" value="{{ Request::segment(2) }}">
					<div class="form-group">
						<label class="col-lg-3 col-form-label font-weight-semibold">File Eviden	:</label>
						<input 
						type="file" 
						name="file_eviden" 
						class="file-input"
						multiple="multiple" 
						placeholder="Icon Apps"
						{{ isset($detail_data) ? "" : "required" }}

						data-parsley-required-message="File tidak boleh kosong !"  
						/>
					</div>
					<div class="form-group">
						<label>Keterangan :</label>
						<textarea rows="3" cols="3" class="form-control" name="ket" placeholder="Keterangan"></textarea>
					</div>
				<div class="card-footer d-flex justify-content-between align-items-center">
					<button type="submit" class="btn bg-blue">Upload<i class="icon-paperplane ml-2"></i></button>
					<button type="submit" class="btn bg-teal-400">Proses Selesai</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	@endsection


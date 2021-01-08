@extends('layouts.main_layout')
@section('css')
<link href="{{ asset('global_assets/js/parsley/parsley.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('global_assets/js/parsley/github.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('js-bottom')
	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('global_assets/js/demo_pages/datatables_basic.js') }}"></script>
	<script type="text/javascript">
	
		    $('#user-lists').DataTable({
		    	autoWidth: false,
		    	columnDefs: [
				{ width: 10, targets: 0 },
				{ width: 80, targets: 1 },
				{ width: 80, targets: 2 },
				{ width: 190, targets: 3 },
				
			],
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>'
		    });
	
	</script>
	<script src="{{ asset('global_assets/js/parsley/highlight.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/parsley/parsley.js') }}"></script>
	

@endsection
@section('content')
	<div class="row">
		<div class="col-md-6">
				<div class="card">
					<div class="card-header bg-transparent header-elements-inline">
						<h6 class="card-title">List Users</h6>

						<div class="header-elements">
						
	                	</div>
					</div>

					<table id="user-lists" class="table datatable-basic">
						<thead>
							<tr>
								<th>Username</th>
								<th>Role</th>
								<th>Status</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
								<tr>
									<td>{{ $user->username }}</td>
									
									<td>
										@if($user->id_role == 1)
											<b style="color:orange;">User</b>
										@elseif($user->id_role == 2)
											<b style="color:orange;">Admin</b>
										@elseif($user->id_role == 3)
											<b style="color:orange;">Super Admin</b>
										@endif
									</td>
									<td>
										@if($user->is_active == 1)
											<b style="color:green;">Active</b>
										@else
											<b style="color:red;">Non-Active</b>
										@endif
									</td>
									<td style="text-align: center;">
										
										<a href="{{ url('/user') }}/{{ $user->id }}">
											<button class="btn btn-primary"><i class="icon-pencil7"></i></button>
										</a>
										<!-- <button class="btn btn-primary">Ubah Password</button> -->
										<a href="{{ url('/delete') }}/{{ $user->id }}">
										<button class="btn btn-danger"><i class="icon-trash"></i></button>
									</a>
									</td>
									
								</tr>
							@endforeach
							
							
						</tbody>
					</table>
				</div>
					<!-- /action toolbar -->


					
				

		</div>
		<div class="col-md-6">
				<div class="card">
					<ul class="nav nav-tabs nav-tabs-highlight mb-0">
									<li class="nav-item"><a href="#bordered-tab1" class="nav-link active" data-toggle="tab">
										@if(isset($detail_user))
											Update User Form
										@else
											Form Registration User
										@endif
									</a></li>
									@if(isset($detail_user))
									<li class="nav-item"><a href="#bordered-tab2" class="nav-link" data-toggle="tab">Ubah Password</a></li>
									@endif
								
								</ul>

								<div class="tab-content card card-body border-top-0 rounded-top-0 mb-0">
									<div class="tab-pane fade show active" id="bordered-tab1">
									
					<div class="card-body">
								<form 
									action="{{ URL::to('/user/save') }}" 
									data-parsley-validate=""
									method="post">
									 @csrf
									 <input type="hidden" name="is_update" value="{{ isset($detail_user) ? $detail_user->id : ''}}">
									 <input type="hidden" name="id_user" value="{{ isset($detail_user) ? $detail_user->id : ''}}">
									<fieldset>
										<legend class="font-weight-semibold text-uppercase font-size-sm">
											<i class="icon-reading mr-2"></i>
											User Information
											<a class="float-right text-default" data-toggle="collapse" data-target="#demo2">
												<i class="icon-circle-down2"></i>
											</a>
										</legend>

										<div class="collapse show" id="demo1">
											<div class="form-group">
												<label>Username:</label>
												<input 
													type="text" 
													name="username" 
													class="form-control" 
													placeholder="Username"
													required="" 
													value="{{ isset($detail_user) ? $detail_user->username : '' }}" 
													data-parsley-required-message="Username tidak boleh kosong !"  
													>
											</div>
											@if(!isset($detail_user))
											<div class="form-group">
												<label>Password:</label>
												<input 
													type="password" 
													id="password"
													name="password" 
													class="form-control" 
													placeholder="Password"
													required="" 
													data-parsley-required-message="Password tidak boleh kosong !"  
													/>
											</div>

											<div class="form-group">
												<label>Repeat password:</label>
												<input 
													type="password" 
													name="ulangi_password" 
													class="form-control" 
													placeholder="Repeat password"
													data-parsley-equalto="#password"
                                    				data-parsley-equalto-message="Password harus sama !"
													data-parsley-required-message="Password tidak boleh kosong !"  
													required="" >
											</div>

											@endif

											<div class="form-group">
												<label>Role:</label>
												<select name="id_role" class="form-control">
													@foreach($user_roles as $role)
														<option 
															value="{{ $role->id }}"
															@if(isset($detail_user))
																@if($role->id == $detail_user->id_role)
																	selected
																@endif
															@endif
															
															> 
															{{ $role->role_name }}
														</option>
													@endforeach
												</select>
											</div>
										</div>
									</fieldset>

						
									<div class="text-right">
										<button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
										<a href="{{ url('/user') }}"><button type="button" class="btn btn-default">Cancel <i class="icon-arrow-left8 ml-2"></i></button></a>
									</div>
								</form>
							</div>
									</div>

									<div class="tab-pane fade" id="bordered-tab2">
										<form 
									action="{{ URL::to('/user/update_password') }}" 
									data-parsley-validate=""
									method="post">
									 @csrf
									 <input type="hidden" name="is_update" value="{{ isset($detail_user) ? $detail_user->id : ''}}">
									 <input type="hidden" name="id_user" value="{{ isset($detail_user) ? $detail_user->id : ''}}">
									<fieldset>
										<legend class="font-weight-semibold text-uppercase font-size-sm">
											<i class="icon-reading mr-2"></i>
											Reset Password
											<a class="float-right text-default" data-toggle="collapse" data-target="#demo2">
												<i class="icon-circle-down2"></i>
											</a>
										</legend>

										<div class="collapse show" id="demo1">
											<div class="form-group">
												<label>Username:</label>
												<input 
												disabled="" 
													type="text" 
													name="username" 
													class="form-control" 
													placeholder="Username"
													required="" 
													value="{{ isset($detail_user) ? $detail_user->username : '' }}" 
													data-parsley-required-message="Username tidak boleh kosong !"  
													>
											</div>
											@if(isset($detail_user))
											<div class="form-group">
												<label>New Password :</label>
												<input 
													type="password" 
													id="new_password"
													name="new_password" 
													class="form-control" 
													placeholder="Password"
													required="" 
													data-parsley-required-message="Password tidak boleh kosong !"  
													/>
											</div>

											<div class="form-group">
												<label>New Repeat password:</label>
												<input 
													type="password" 
													name="new_ulangi_password" 
													class="form-control" 
													placeholder="Repeat password"
													data-parsley-equalto="#new_password"
                                    				data-parsley-equalto-message="Password harus sama !"
													data-parsley-required-message="Password tidak boleh kosong !"  
													required="" >
											</div>

											@endif

											
										</div>
									</fieldset>

						
									<div class="text-right">
										<button type="submit" class="btn btn-primary">Update <i class="icon-paperplane ml-2"></i></button>
										<a href="{{ url('/user') }}"><button type="button" class="btn btn-default">Cancel <i class="icon-arrow-left8 ml-2"></i></button></a>
									</div>
								</form>
									</div>

									
								</div>

					

					<!-- Action toolbar -->
					<!-- /action toolbar -->


					
				</div>

		</div>
	</div>
	
        
@endsection


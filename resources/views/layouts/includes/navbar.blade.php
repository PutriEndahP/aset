<!-- Secondary navbar -->
	<div class="navbar navbar-dark bg-teal-400 navbar-expand-md">
		<div class="text-center d-md-none w-100">
			<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-navigation">
				<i class="icon-unfold mr-2"></i>
				Navigation
			</button>
		</div>

		<div class="navbar-collapse collapse" id="navbar-navigation">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="{{ url('/dashboard') }}" class="navbar-nav-link">
						<i class="icon-home4 mr-2"></i>
						Dashboard
					</a>
				</li>
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-stack3"></i>
						Management Data
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="{{ url('/list_data') }}" class="dropdown-item"><i class="icon-folder2"></i>DOKUMEN ASET</a>
						<!-- <a href="{{ url('/registerse') }}" class="dropdown-item"><i class="icon-file-plus2"></i>Input Surat Edaran</a>
						<a href="#" class="dropdown-item"><i class="icon-folder-upload"></i>Input Pedoman</a>
						<a href="#" class="dropdown-item"><i class="icon-googleplus5"></i>Input Dokumen Perusahan</a> -->
					</div>
				</li>
				
				@if(Auth::user()->id_role == 3)
				<!-- <li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-archive"></i>
						Master Data -->
						<!-- <span class="d-md-none ml-2">Dropdown</span> -->
				<!-- 	</a> -->

		<!-- 			<div class="dropdown-menu dropdown-menu-left">
						<a href="{{ url('/forminput') }}" class="dropdown-item"><i class="icon-file-plus"></i>Dokumen Aset</a>
						<a href="{{ url('') }}" class="dropdown-item"><i class="icon-file-plus2"></i>Dokumen SPK</a> -->
						<!-- <a href="{{ url('user') }}" class="dropdown-item"><i class="icon-user-plus"></i>Data User</a> -->
						<!-- <a href="{{ url('/kategori') }}" class="dropdown-item"><i class="icon-archive"></i>Kategori Dokumen</a> -->
						<!-- <a href="{{ url('/mastersop-evaluasi') }}" class="dropdown-item"><i class="icon-database2"></i> SOP Evaluasi</a> -->
					<!-- </div> -->
				<!-- </li> -->
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-people"></i>
						Konfigurasi Pengguna
						<!-- <span class="d-md-none ml-2">Dropdown</span> -->
					</a>

					<div class="dropdown-menu dropdown-menu-left">
						<a href="{{ url('user') }}" class="dropdown-item"><i class="icon-user-plus"></i>Data User</a>
						<a href="{{ url('/kategori') }}" class="dropdown-item"><i class="icon-archive"></i>Kategori Dokumen</a>
						<!-- <a href="{{ url('/mastersop-evaluasi') }}" class="dropdown-item"><i class="icon-database2"></i> SOP Evaluasi</a> -->
					</div>
				</li>
				@endif

			
				
			</ul>
		</div>
	</div>
	<!-- /secondary navbar -->
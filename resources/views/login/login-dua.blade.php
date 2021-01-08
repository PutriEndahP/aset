
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ASET</title>

    <!-- begin::global styles -->
     <link rel="shortcut icon" href="{{ asset('assets_admin/media/image/logo.png') }}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets_admin/vendors/bundle.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets_admin/css/app.min.css') }}" type="text/css">
    <link href="{{ asset('assets_admin/js/parsley/parsley.css') }}" rel="stylesheet" type="text/css">
    <!-- end::global styles -->

    <!-- begin::custom styles -->

    <!-- end::custom styles -->

</head>
<body class="bg-white h-100-vh p-t-0">

<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
    <span>Loading ...</span>
</div>
<!-- end::page loader -->

<div class="p-b-50 d-block d-lg-none"></div>

<div class="container h-100-vh">
    <div class="row align-items-md-center h-100-vh">
        <div class="col-lg-6 d-none d-lg-block">
            <img class="img-fluid" src="{{ asset('assets_admin/media/image/aset1.png') }}" alt="...">
        </div>
        <div class="col-lg-4 offset-lg-1">
            <div class="d-flex align-items-center m-b-20">
                <img src="{{ asset('assets_admin/media/image/logo.png') }}" class="m-r-15" width="40" alt="">
                <h3 class="m-0">MONITORING ASET</h3>
            </div>
            <span class="d-block text-muted">
                @if($errors->any())
               <h6 style="color:red;">{{$errors->first()}}</h6>
             @endif
           </span>
            <p>Login untuk melanjutkan.</p>
            <form action="{{ URL::to('/login/authenticate') }}" method="POST"  data-parsley-validate="" >
                @csrf
                <div class="form-group mb-4">
                        <input 
                        type="text" 
                        name="username" 
                        class="form-control form-control-lg" 
                        required="" 
                        autofocus
                        data-parsley-required-message="Username tidak boleh kosong !" 
                        value="{{ old('username') }}" 
                        placeholder="Username" />

                
                </div>
                <div class="form-group mb-4">
                        <input 
                        type="password" 
                        name="password" 
                        required="" 
                        value="{{ old('password') }}" 
                        class="form-control form-control-lg" 
                        data-parsley-required-message="Password tidak boleh kosong !" 
                        placeholder="Password">
                </div>
                <button class="btn btn-primary btn-lg btn-block btn-uppercase mb-4">Sign In</button>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Keep me signed in</label>
                    </div>
                   
                </div>
                
            </form>
        </div>
    </div>
</div>


<script src="{{ asset('assets_admin/vendors/bundle.js') }}"></script>
<script src="{{ asset('assets_admin/js/app.min.js') }}"></script>
<script src="{{ asset('assets_admin/js/parsley/highlight.min.js') }}"></script>
<script src="{{ asset('assets_admin/js/parsley/parsley.js') }}"></script>




</body>
</html>

@extends('admin.layouts.master')
@section('title','Dashboard')
@push('custom-css')
    <!-- overlayScrollbars -->
  <link rel="stylesheet" href={{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}>
  <!-- Daterange picker -->
  <link rel="stylesheet" href={{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}>
  <!-- summernote -->
  <link rel="stylesheet" href={{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href={{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}>
  <!-- iCheck -->
  <link rel="stylesheet" href={{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}>
  <!-- JQVMap -->
  <link rel="stylesheet" href={{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}>
@endpush
@section('content')

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row"> 
      <div class="col-lg-3 col-6">
        @if (Session::has('success')) 
			<div class="alert alert-primary">
				{{ Session('success') }}
			</div>
		@endif
      </div> 
       <!-- /.col -->
      
      <!-- /.col -->
      <!-- ./col -->
      <div class="col-lg-5">
          <div class="info-box">
            <span class="info-box-icon bg-primary"><i class="fa-solid fa-users"></i></span>
  
            <div class="info-box-content">
              <span class="info-box-text">You are Super Administrator</span>
              <span class="info-box-number">Add your Admin team in here!!</span>
            </div>

          </div>
        <!-- form -->
            <form method="post" action="/add-admin" class="mb-5" enctype="multipart/form-data"> {{-- method post+action yg mengarah ke route => method store di Controller resourcenya --}}
              @csrf
              <div class="form-floating mt-5">
                <label for="name">Nama</label>
                <input type="text" name="nama" class="form-control rounded-top mb-3 @error('name') is-invalid @enderror" id="name" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
              </div>
              <div class="form-floating">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control mb-3 @error('email') is-invalid @enderror" id="email"  required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
              </div>
              <div class="form-floating">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control mb-3 rounded-bottom @error('password') is-invalid @enderror" id="password"  required >
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
              </div>
            <input type="hidden" name="role" value="admin">
            <button type="submit" class="btn btn-primary">Tambah Admin</button>
          </form>
      </div>
    </div>
      
</div>
@endsection



@push('custom-script')
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('') }}assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('') }}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('') }}assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('') }}assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('') }}assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('') }}assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
@endpush 
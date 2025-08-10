@extends('user.layouts.master')
@section('title','Dashboard User ')
@push('custom-css')
    <!-- overlayScrollbars -->
  <link rel="stylesheet" href={{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}>
  <!-- Daterange picker -->
  <link rel="stylesheet" href={{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}>
  <!-- summernote -->
  <link rel="stylesheet" href={{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}>
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/css.css">
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
        
        @if(session()->has('info'))
          <div class="alert alert-info col-lg-8" role="alert">
            {{ session('info') }}
          </div>
        @endif
         
        @if(session()->has('error'))
          <div class="alert alert-danger col-lg-8" role="alert">
            {{ session('error') }}
          </div>
        @endif 

      </div>  
      <!-- ./col -->
      <div class="col-lg-5" >
        <!-- form -->
            <form method="post" action="/penarikan/store" class="mb-5" enctype="multipart/form-data"> {{-- method post+action yg mengarah ke route => method store di Controller resourcenya --}}
              @csrf
            <div class="mb-3">
              <label for="namabank" class="form-label">Nama Bank</label>
              <input type="text" class="form-control " id="namabank" name="nama_bank" required autofocus>
            </div>
            <div class="mb-3">
              <label for="namaakun" class="form-label">Nama Akun Bank</label>
              <input type="text" class="form-control " id="namaakun" name="nama_akunbank" required autofocus>
            </div>
            <div class="mb-3"> 
              <label for="norek" class="form-label">Nomor Rekening</label>
              <input type="number" class="form-control " id="norek" name="no_rek" required autofocus>
            </div>
            <div class="mb-3">
              <label for="jmlh" class="form-label">Jumlah Penarikan</label>
              <input type="number" class="form-control " id="jmlh" name="jmlh_penarikan" required autofocus>
            </div>
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <button type="submit" class="btn btn-primary">Submit Penarikan</button>
          </form>
      </div>
    </div>
    <div class="row d-flex justify-content-center">
      
      
    </div>
    <!-- /.row -->
    <!-- Main row -->
@endsection


@push('custom-script')
<!-- jQuery UI 1.11.4 -->
<script src={{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src={{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
<!-- jQuery Knob Chart -->
<script src={{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src={{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}></script>
<!-- Summernote -->
<script src={{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}></script>
<!-- overlayScrollbars -->
<script src={{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}></script>
@endpush
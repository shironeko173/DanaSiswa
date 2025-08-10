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

    

    <div class="row mt-3 justify-content-md-center"> 
      {{-- <div class="col-lg-3 col-6">
        @if (Session::has('success')) 
						<div class="alert alert-primary">
							{{ Session('success') }}
						</div>
					@endif 
      </div>  --}}
       
      
      <div class="col-lg-5">
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="bi bi-bank2"></i></span>
  
            <div class="info-box-content">
              <span class="info-box-text">BNI - Dana Siswa</span>
              <span class="info-box-number">1234-5678-9999</span>
            </div>
 
          </div>
        <!-- form -->
            <form method="post" action="/deposit/store" class="mb-5" enctype="multipart/form-data"> {{-- method post+action yg mengarah ke route => method store di Controller resourcenya --}}
              @csrf
            <div class="mb-3">
              <label for="jmlh" class="form-label">Jumlah Deposit</label>
              <input type="number" class="form-control " id="jmlh" name="jmlh_deposit" required autofocus>
            </div>
            <div class="mb-3">
              <label for="image" class="form-label">Bukti Transfer</label>
              <input class="form-control @error('buktitf') is-invalid @enderror" type="file" id="image"  name="buktitf">
                @error('buktitf')
                  <div class="invalid-feedback d-block">
                    {{ $message }}
                  </div> 
                @enderror
            </div>
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <button type="submit" class="btn btn-primary">Submit Deposit</button>
          </form>
      </div>
    </div>
      
       
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
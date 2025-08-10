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


  <!-- Content Wrapper. Contains page content -->
  {{-- <div class="content-wrapper"> --}}
 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-6">

            @if (session('error'))
                <div class="alert alert-danger alert dismissible fade-show" role="alert">
                  <strong>{{session('error')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif 

            @if (session('success'))
                <div class="alert alert-success alert dismissible fade-show" role="alert">
                  <strong>{{session('success')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
         
            <div class="card">
              <div class="card-header">
              <h3 class="card-title">Ganti Password</h3></h3>
              </div>
              <!-- /.card-header -->
              <div class="col-8 mt-4 mx-auto">
                <form action="{{route('ubah')}}" method="POST">
                @csrf 
                <div class="form-group">
                  <label for="inputEmail">E-Mail</label>
                  <input type="email" value="{{Auth::user()->email}}" id="inputEmail" class="form-control" readonly/>
                </div>
                <div class="form-group">
                  <label for="inputEmail">Password Lama</label>
                  <input type="password" name="current_pass" class="form-control" id="current_pass"/>
                  @error('current_pass')
                      <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="inputEmail">Masukkan Password Baru</label></label>
                  <input type="password" name="password" id="password" class="form-control"/>
                  @error('password')
                      <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="inputEmail">Konfirmasi Password Baru</label>
                  <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"/>
                  @error('password_confirmation')
                      <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group d-flex justify-content-center">
                  <input type="hidden" name="usersid" value="{{Auth::user()->id}}">
                  <button type="submit" class="btn btn-primary">Ganti Password</button>
                </div>
              </form>
              </div> 

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
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
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
      <i class="iconify" data-icon="bi:pin-fill"></i><h6>Users Statistic</i>
    </div>
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
          <div class="inner">
            
            <h4>{{ $users }}</h4>
                
           
            <p>Total Users</p>
          </div>
          <div class="icon">
            <i class="iconify" data-icon="bxs:user"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h4><sup style="font-size: 10px">Rp</sup>{{$total}}</h4>
            <p>Total Tabungan</p>
          </div>
          <div class="icon">
            <i class="iconify" data-icon="fa6-solid:sack-dollar"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="row"> 
      <i class="iconify" data-icon="bi:pin-fill"></i><h6>Deposit Statistic</h6></i>
    </div>
    <div class="row">
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h4><sup style="font-size: 10px">Rp</sup>{{ $jumlah }}</h4>
            <p>Total Deposito</p>
          </div>
          <div class="icon">
            <i class="iconify" data-icon="fa6-solid:sack-dollar"></i>
          </div>
        </div>
      </div>
    
      <!-- ./col -->
      
    </div>
    {{-- baris kedua --}}
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h4><sup style="font-size: 10px"></sup>{{ $dp1 }}</h4>
            <p>Jumlah Deposito</p>
          </div>
          <div class="icon">
            <i class="iconify" data-icon="bxs:user"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h4 style="color: white"><sup style="font-size: 10px"></sup>{{ $pendingdep }}</h4>
            <p style="color: white">Ditunda</p>
          </div>
          <div class="icon">
            <i class="iconify" data-icon="bi:clock-fill"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h4><sup style="font-size: 10px"></sup>{{ $selesaidep }}</h4>
            <p>Selesai</p>
          </div>
          <div class="icon">
            <i class="iconify" data-icon="akar-icons:circle-check-fill"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h4><sup style="font-size: 10px"></sup>{{ $ditolakdep }}</h4>
            <p>Ditolak</p>
          </div>
          <div class="icon">
            <i class="iconify" data-icon="entypo:circle-with-cross"></i>
          </div>
        </div>
      </div>
    </div>

    {{-- Penarikan Statistik --}}
    {{-- Baris Pertama --}}
    <div class="row"> 
      <i class="iconify" data-icon="bi:pin-fill"></i><h6>Statistik Penarikan</h6></i>
    </div>
    <div class="row">
      <!-- ./col -->
      
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h4><sup style="font-size: 10px">Rp</sup>{{ $penarikan }}</h4>
            <p>Total Penarikan</p>
          </div>
          <div class="icon">
            <i class="iconify" data-icon="fa6-solid:hand-holding-dollar"></i>
          </div>
        </div>
      </div>
      
      <!-- ./col -->
      
    </div>

    {{-- baris kedua dari deposit statistic --}}

    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h4><sup style="font-size: 10px"></sup>{{ $dp2 }}</h4>
            <p>Jumlah Penarikan</p>
          </div>
          <div class="icon">
            <i class="iconify" data-icon="bxs:user"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h4 style="color: white"><sup style="font-size: 10px"></sup>{{ $pendingpen }}</h4>
            <p style="color: white">Ditunda</p>
          </div>
          <div class="icon">
            <i class="iconify" data-icon="bi:clock-fill"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h4><sup style="font-size: 10px"></sup>{{ $selesaipen }}</h4>
            <p>Selesai</p>
          </div>
          <div class="icon">
            <i class="iconify" data-icon="akar-icons:circle-check-fill"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h4><sup style="font-size: 10px"></sup>{{ $ditolakpen }}</h4>
            <p>Ditolak</p>
          </div>
          <div class="icon">
            <i class="iconify" data-icon="entypo:circle-with-cross"></i>
          </div>
        </div>
      </div>
    </div>
    
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
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
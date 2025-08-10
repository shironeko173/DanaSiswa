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
      <div class="col-lg ">
        @if (Session::has('success')) 
        @foreach ($notifikasi as $notif)
          <div class="alert  alert-primary alert-dismissible fade show" role="alert">
            <strong> {{ $notif->pesan }}   </strong> <small>  (tekan x untuk menghapus pesan)</small>
            <form action="/notifupdate" method="POST" class="d-inline">
              {{-- @method('put') --}}
              @csrf  
              <input type="hidden" name="id_notif" value="{{ $notif->id }}">                             
              <input type="hidden" name="status" value="0">                             
              <button class="btn btn-primary btn-lg p-0 mb-4" style="float: right; " type="submit"><i class="bi bi-x-circle"></i></button>
              
              </button>
              </form>
            </div>
            @endforeach
            @endif 
      </div> 
    </div>

    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
          <h4>{{Auth::user()->tabungan->saldo}}</h4>
            <p>Saldo Tabungan</p>
          </div>
          <div class="icon">
            <i><script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                <lord-icon
                        src="https://cdn.lordicon.com/qhviklyi.json"
                        trigger="loop"
                        delay="10000"
                        colors="primary:#121331,secondary:#e8e230"
                        style="width:75px;height:75px;margin-bottom:70px">
                    </lord-icon>
            </i>
          </div> 
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h4>{{ $jdepo }}</h4>
            <p>Total Deposit</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h4>{{ $jnarik }}</h4>
            <p>Total Penarikan</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
         <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-light">
          <div class="inner">
            <h4><span class="badge badge-sm bg-gradient-success">Aktif</span></h4>
            <p>Status User</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      </div>
      <!-- ./col -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
         
            <div class="card">
              <div class="card-header">
              <h3 class="card-title">Riwayat Deposito</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Waktu dan Tanggal</th>
                    <th>Jumlah Deposito</th>
                    <th>Bukti Transfer</th>
                    <th>Keterangan</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($rdeposit as $depo)
                    <tr>
                        <td>{{$depo->created_at}}</td>
                        <td>{{$depo->jmlh_deposit}}</td>
                        <td><img src=" {{ asset('uploads/' . $depo->buktitf) }}" class="img-preview" width="100px" height="100px"></td>
                        <td>{{$depo->status}}</td>
                    </tr>
                    @endforeach
                  <tfoot> 
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              <br>
            </div>
            <div class="card">
              <div class="card-header">
              <h3 class="card-title">Riwayat Penarikan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Waktu dan Tanggal</th>
                    <th>Nama Akun Bank</th>
                    <th>Nomor Rekening</th>
                    <th>Jumlah Penarikan</th>
                    <th>Keterangan</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($rpenarikan as $tarik)
                    <tr>
                        <td>{{$tarik->created_at}}</td>
                        <td>{{$tarik->nama_akunbank}}</td>
                        <td>{{$tarik->no_rek}}</td>
                        <td>{{$tarik->jmlh_penarikan}}</td>
                        <td>{{$tarik->status}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
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
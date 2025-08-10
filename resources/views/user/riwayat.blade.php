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
                    @foreach($deposit as $depo)
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
              <div class="d-flex justify-content-center">
                {{$deposit->links()}}
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
                    @foreach($penarikan as $tarik)
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
              <div class="d-flex justify-content-center">
                {{$penarikan->links()}}
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
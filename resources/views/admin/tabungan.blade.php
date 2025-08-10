@extends('admin.layouts.master')
@section('title','Tabungan Siswa')
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
                <h3 class="card-title">Tabungan Siswa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body px-3">
              <table id="example1" class="table table-striped table-bordered ">
          <thead>
            <tr >
              <th>Id User</th>
              <th>Nama</th>
              <th>NIS</th>
              <th>Jumlah Tabungan</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($users as $tampil)
              <tr>
                <td>{{ $tampil->id }}</td>
                <td>{{ $tampil->nama }}</td>
                <td>{{ $tampil->nis }}</td>
                <td>{{ $tampil->tabungan->saldo}}</td>
                </tr>
            @empty
            <tr>
              <td colspan="5" class="text-center">Tidak ada riwayat Tabungan terbaru</td>
            </tr>
            @endforelse
            
          </tbody>
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
      {{-- pagination --}}
      <div class="d-flex justify-content-center">
        {{$users->links()}}
      </div>
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
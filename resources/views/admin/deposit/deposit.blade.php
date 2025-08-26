@extends('admin.layouts.master')
@section('title','Deposit')
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
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>
          @if (Session::has('success')) 
          <div class="alert alert-primary">
            {{ Session('success') }}
          </div>
          @endif
        </div>
        
        <!-- /.card-header -->
        <div class="card-body table-responsive px-3">

          <div class="row mt-4">
            <div class="col">
                  <form action="/deposit/search" method="POST" class="form-inline">
                    @csrf
                    <input type="date" class="form-control input" id="fromDate" name="fromDate" required>
                    <label for="date" class="col-form-label ml-3 mr-3"> To :</label>
                    <input type="date" class="form-control input-ml-3" id="toDate" name="toDate" required>
                    <button type="submit" class="btn btn-info ml-3 border-0" name="search" title="Search">Filter</button>
                </form>
            </div>
        </div> 

          <table class="table table-striped table-bordered" id="example1">

            <thead>
              <tr >
                <th>Tanggal Deposit</th>
                <th>NIS</th>
                <th>Jumlah Deposit</th>
                <th>Bukti transfer</th>
                <th>Status</th>
              </tr> 
            </thead>
            <tbody>
              @forelse ($deposit as $depo) 
                <tr>
                  <td>{{ $depo->created_at }}</td>
                  <td>{{ $depo->user->nis }}</td>
                  <td>{{ $depo->jmlh_deposit }}</td>
                  <td>
                    <img src=" {{ asset('storage/' . $depo->buktitf) }}" class="img-preview" width="100px" height="100px">
                  </td>
                  <td>{{ $depo->status }}</td>
                </tr>
              @empty
              <tr>
								<td colspan="5" class="text-center">Tidak ada riwayat deposit terbaru</td>
							</tr>
              @endforelse
              
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center">
          {{$deposit->links()}}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
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
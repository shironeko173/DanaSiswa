@extends('admin.layouts.master')
@section('title','Validasi User')
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

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 300px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-striped table-bordered">
            <thead>
              <tr >
                <th>Tanggal Daftar</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Email</th> 
                <th>Verifikasi Status</th>
                <th>Aksi</th>
              </tr> 
            </thead>

            <tbody>
              <tr>

                  @forelse ($users as $user)
                  <tr>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->nis }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>

                      <button class="btn btn-success" role="button" 
                        data-iduser="{{ $user->id  }}"
                        data-nama="{{ $user->nama  }}"
                        data-nis="{{ $user->nis }}"
                        data-email="{{ $user->email }}"
                        data-link="{{ route('users.update', $user->id) }}"
                        data-toggle="modal" 
                        data-target="#modal-verify">
                        Verify
                     </button>

                        <form action="{{ route('users.destroy', $user->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete') 
                          <button class="btn  btn-danger btn-sm ml-2" onclick="return confirm('Apakah kamu yakin menghapus User: {{ $user->nama }} ini?')">
                            <i class="fa fa-times"></i>
                          </button>
                        </form>
                    </td>
                  </tr>
                @empty
                <tr>
                  <td colspan="6" class="text-center">Tidak ada Akun Terbaru</td>
                </tr>
                @endforelse
                </tr> 
              
                  {{-- Confirm verify --}}
                      <div class="modal fade" id="modal-verify" tabIndex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Please Confirm</h4>
                              <button type="button" class="close" data-dismiss="modal">x</button>
                            </div>
                            <div class="modal-body">
                              <p class="lead"> 
                                Verifikasi User Baru
                              </p>
                              <form method="POST" action="">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                @method('PUT')
                                <div class="form-group">
                                  <label for="user_id">Id User</label>
                                  <input type="text" name="id" class="form-control" id="user_id" readonly>
                                </div>
                                <div class="form-group">
                                  <label for="nama">Nama Siswa </label>
                                  <input type="text" name="nama" class="form-control" id="nama" readonly>
                                </div>
                                <div class="form-group">
                                  <label for="nis">Nomor Induk Siswa </label>
                                  <input type="text" name="nis" class="form-control" id="nis" readonly>
                                </div>
                                <div class="form-group">
                                  <label for="email">Email Siswa </label>
                                  <input type="text" name="email" class="form-control" id="email" readonly>
                                </div>
                               
                                <input type="hidden" name="role" value="user">
                                <input type="hidden" name="saldo" value="">
                                <input type="hidden" id="user_id" name="users_id" value="" >
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                              
                                <button type="submit" class="btn btn-success d-flex justify-content-center">
                                  Verify
                                </button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div> 
                  {{-- End modal verify --}}

            </tbody>
          </table>
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
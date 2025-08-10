@extends('admin.layouts.master')
@section('title','Validasi Penarikan')
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
                <th>Tanggal Penarikan</th>
                <th>NIS</th>
                <th>Nama Bank</th>
                <th>Nama Akun Bank</th>
                <th>Nomor Rekening</th>
                <th>Jumlah Penarikan</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($penarikan as $narik)
                <tr>
                  <td>{{ $narik->created_at }}</td>
                  <td>{{ $narik->user->nis }}</td>
                  <td>{{ $narik->nama_bank }}</td>
                  <td>{{ $narik->nama_akunbank }}</td>
                  <td>{{ $narik->no_rek }}</td>
                  <td>{{ $narik->jmlh_penarikan }}</td>
                  <td>{{ $narik->status }}</td>

                  <td>
                    <button class="btn btn-success" role="button" 
                      data-idnarik="{{ $narik->id  }}"
                      data-iduser="{{ $narik->user->id  }}"
                      data-nis="{{ $narik->user->nis  }}"
                      data-namabank="{{ $narik->nama_bank }}"
                      data-akunbank="{{ $narik->nama_akunbank }}"
                      data-norek="{{ $narik->no_rek }}"
                      data-jumlah="{{ $narik->jmlh_penarikan }}"
                      data-link="{{ route('penarikan.update', $narik->id) }}"
                      data-toggle="modal" 
                      data-target="#modal-approve-penarikan">
                      Approve
                    </button>

                    <button class="btn btn-danger" role="button" 
                      data-idnarik="{{ $narik->id  }}"
                      data-iduser="{{ $narik->user->id  }}"
                      data-nis="{{ $narik->user->nis  }}"
                      data-namabank="{{ $narik->nama_bank }}"
                      data-akunbank="{{ $narik->nama_akunbank }}"
                      data-norek="{{ $narik->no_rek }}"
                      data-jumlah="{{ $narik->jmlh_penarikan }}"
                      data-link="{{ route('penarikan.update', $narik->id) }}"
                      data-toggle="modal" 
                      data-target="#modal-decline-penarikan">
                      Decline
                    </button>

                  </td>
                </tr>
              @empty
              <tr>
								<td colspan="8" class="text-center">Tidak ada  penarikan terbaru</td>
							</tr>
              @endforelse
              
              {{-- Confirm Approve --}}
                <div class="modal fade" id="modal-approve-penarikan" tabIndex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Please Confirm</h4>
                        <button type="button" class="close" data-dismiss="modal">x</button>
                      </div>
                      <div class="modal-body">
                        <p class="lead"> 
                          Cek Validasi Penarikan
                        </p> 
                        <form method="POST" action="">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          @method('PUT')
                          <div class="form-group">
                            <label for="user_id">Id User</label>
                            <input type="text" name="userid" class="form-control" id="user_id" readonly>
                          </div>
                          <div class="form-group">
                            <label for="nis">Nomor Induk Siswa </label>
                            <input type="number" name="nis" class="form-control" id="nis" readonly>
                          </div>
                          <div class="form-group">
                            <label for="namabank">Nama Bank </label>
                            <input type="text" name="nama_bank" class="form-control" id="namabank" readonly>
                          </div>
                          <div class="form-group">
                            <label for="akunbank">Nama Akun Bank </label>
                            <input type="text" name="nama_akunbank" class="form-control" id="akunbank" readonly>
                          </div>
                          <div class="form-group">
                            <label for="norek">Nomor Rekening </label>
                            <input type="number" name="no_rek" class="form-control" id="norek" readonly>
                          </div>
                          <div class="form-group">
                            <label for="jmlhnarik">Jumlah Penarikan </label>
                            <input type="text" name="jumlah" class="form-control" id="jmlhnarik" readonly>
                          </div>
                          <input type="hidden" name="pesan" value="Selamat, Pengajuan penarikan anda berhasil disetujui. Silahkan cek riwayat transaksi untuk lebih lanjut.">
                          <input type="hidden" name="status" value="approve">
                          <input type="hidden" id="narik_id" name="penarikan_id" value="" >
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                        
                          <button type="submit" class="btn btn-success d-flex justify-content-center">
                            Approve
                          </button>
                        </form>  
                      </div> 
                    </div>
                  </div>
                </div> 
              {{-- End modal approve --}} 


             {{-- Modal Decline  --}}
                <div class="modal fade" id="modal-decline-penarikan" tabIndex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Please Confirm</h4>
                        <button type="button" class="close" data-dismiss="modal">x</button>
                      </div>
                      <div class="modal-body">
                        <p class="lead"> 
                          Cek Validasi Penarikan
                        </p>
                        <form method="POST" action="">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          @method('PUT')
                          <div class="form-group">
                            <label for="user_id">Id User</label>
                            <input type="text" name="userid" class="form-control" id="user_id" readonly>
                          </div>
                          <div class="form-group">
                            <label for="nis">Nomor Induk Siswa </label>
                            <input type="number" name="nis" class="form-control" id="nis" readonly>
                          </div>
                          <div class="form-group">
                            <label for="namabank">Nama Bank </label>
                            <input type="text" name="nama_bank" class="form-control" id="namabank" readonly>
                          </div>
                          <div class="form-group">
                            <label for="akunbank">Nama Akun Bank </label>
                            <input type="text" name="nama_akunbank" class="form-control" id="akunbank" readonly>
                          </div>
                          <div class="form-group">
                            <label for="norek">Nomor Rekening </label>
                            <input type="number" name="no_rek" class="form-control" id="norek" readonly>
                          </div>
                          <div class="form-group">
                            <label for="jmlhnarik">Jumlah Penarikan </label>
                            <input type="text" name="jumlah" class="form-control" id="jmlhnarik" readonly>
                          </div>
                          <input type="hidden" name="pesan" value="Mohon maaf, Pengajuan Penarikan anda ditolak. Silahkan cek F.A.Q untuk mengetahui cara melakukan penarikan yang benar.">
                          <input type="hidden" name="status" value="reject">
                          <input type="hidden" id="narik_id" name="penarikan_id" value="" >
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                        
                          <button type="submit" class="btn btn-danger d-flex justify-content-center">
                            Decline
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              {{-- End modal Decline --}}

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
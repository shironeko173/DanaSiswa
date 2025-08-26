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
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href={{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}>
  <!-- iCheck -->
  <link rel="stylesheet" href={{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}>
  <!-- JQVMap -->
  <link rel="stylesheet" href={{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                <th>Tanggal Deposit</th>
                <th>NIS</th>
                <th>Jumlah Deposit</th>
                <th>Bukti transfer</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($deposit as $depo)
                <tr>
                  <td>{{ $depo->created_at  }}</td>
                  <td>{{ $depo->user->nis }}</td>
                  <td>{{ $depo->jmlh_deposit }}</td>
                  <td>
                    <img src=" {{ asset('storage/' . $depo->buktitf) }}" class="img-preview" width="100px" height="100px" 
                    style="cursor:pointer" onclick="onClick(this)">
                </td>
                  <td>{{ $depo->status }}</td>
                  <td>
                    <button class="btn btn-success" role="button" 
                      data-iddepo="{{ $depo->id  }}"
                      data-iduser="{{ $depo->user->id  }}"
                      data-nis="{{ $depo->user->nis }}"
                      data-jumlah="{{ $depo->jmlh_deposit }}"
                      data-link="{{ route('deposit.update', $depo->id) }}"
                      data-toggle="modal" 
                      data-target="#modal-approve">
                      Approve
                    </button>

                    <button class="btn btn-danger" role="button" 
                      data-iddepo="{{ $depo->id }}"
                      data-iduser="{{ $depo->user->id  }}"
                      data-nis="{{ $depo->user->nis }}"
                      data-jumlah="{{ $depo->jmlh_deposit }}"
                      data-link="{{ route('deposit.update', $depo->id) }}"
                      data-toggle="modal" 
                      data-target="#modal-decline">
                      Decline
                    </button>

                  </td>
                </tr> 
              @empty
              <tr> 
								<td colspan="6" class="text-center">Tidak ada Deposit terbaru</td>
							</tr>
              @endforelse
              
              {{-- Confirm Approve --}}
                <div class="modal fade" id="modal-approve" tabIndex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Please Confirm</h4>
                        <button type="button" class="close" data-dismiss="modal">x</button>
                      </div>
                      <div class="modal-body">
                        <p class="lead"> 
                          Cek Validasi Deposit
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
                            <label for="jmlhdepo">Jumlah Deposit </label>
                            <input type="text" name="jumlah" class="form-control" id="jmlhdepo" readonly>
                          </div>
                          <input type="hidden" name="pesan" value="Selamat, Pengajuan Deposit anda berhasil disetujui. Silahkan cek riwayat transaksi untuk lebih lanjut.">
                          <input type="hidden" name="status" value="approve">
                          <input type="hidden" id="depo_id" name="deposit_id" value="" >
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
              <div class="modal fade" id="modal-decline" tabIndex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Please Confirm</h4>
                      <button type="button" class="close" data-dismiss="modal">x</button>
                    </div>
                    <div class="modal-body">
                      <p class="lead"> 
                        Cek Validasi Deposit
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
                          <label for="jmlhdepo">Jumlah Deposit </label>
                          <input type="text" name="jumlah" class="form-control" id="jmlhdepo" readonly>
                        </div>
                        <input type="hidden" name="pesan" value="Mohon maaf, Pengajuan Deposit anda ditolak. Silahkan cek F.A.Q untuk mengetahui cara melakukan deposit yang benar.">
                        <input type="hidden" name="status" value="reject">
                        <input type="hidden" id="depo_id" name="deposit_id" value="" >
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

              {{-- Modal Img-preview --}}
              <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
                <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                <div class="w3-modal-content w3-animate-zoom">
                  <img id="img01" style="width:100%">
                </div>
              </div>

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</div>
@endsection

v 

@push('custom-script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });
</script>
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
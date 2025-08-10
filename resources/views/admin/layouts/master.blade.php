<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Dashboard User')</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  @stack('custom-css')
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  
  <style>

  </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('assets/dist/img/logo-removebg-preview.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  @include('admin.layouts.nav-header')
  @include('admin.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>

  @include('admin.layouts.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper --> 

<!--Ck-editor-->
@yield('ck-editor')
 
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

{{-- form Validasi Deposit --}}
{{--  Deposit Approve --}}
<script> 
  $('#modal-approve').on('show.bs.modal', function (event){

    
    var button = $(event.relatedTarget)
    var iddeposit = button.data('iddepo')
    var iduser = button.data('iduser')
    var nis = button.data('nis')
    var jmlh_deposit = button.data('jumlah')
    var link = button.data('link')
 
    var modal = $(this)
    modal.find('.modal-body input#user_id').val(iduser);
    modal.find('.modal-body input#depo_id').val(iddeposit);
    modal.find('.modal-body input#nis').val(nis);
    modal.find('.modal-body input#jmlhdepo').val(jmlh_deposit);
    modal.find('.modal-body form-action').val(link);
  })
</script>

{{-- Deposite Decline --}}
<script>
  $('#modal-decline').on('show.bs.modal', function (event){

    var button = $(event.relatedTarget)
    var iddeposit = button.data('iddepo')
    var iduser = button.data('iduser')
    var nis = button.data('nis')
    var jmlh_deposit = button.data('jumlah')
    var link = button.data('link')
    

    var modal = $(this)
    modal.find('.modal-body input#user_id').val(iduser);
    modal.find('.modal-body input#depo_id').val(iddeposit);
    modal.find('.modal-body input#nis').val(nis);
    modal.find('.modal-body input#jmlhdepo').val(jmlh_deposit);
    modal.find('.modal-body form-action').val(link);
    
  })
</script>

{{-- End Validasi Deposit --}}


{{-- form Validasi Penarikan --}}
{{--  Penarikan Approve --}}
<script> 
  $('#modal-approve-penarikan').on('show.bs.modal', function (event){


    var button = $(event.relatedTarget)
    var id_narik = button.data('idnarik')
    var id_user = button.data('iduser')
    var nis = button.data('nis')
    var nama_bank = button.data('namabank')
    var akun_bank = button.data('akunbank')
    var no_rek = button.data('norek')
    var jmlh_penarikan = button.data('jumlah')
    var link = button.data('link')

    var modal = $(this)
    modal.find('.modal-body input#user_id').val(id_user);
    modal.find('.modal-body input#narik_id').val(id_narik);
    modal.find('.modal-body input#nis').val(nis);
    modal.find('.modal-body input#namabank').val(nama_bank);
    modal.find('.modal-body input#akunbank').val(akun_bank);
    modal.find('.modal-body input#norek').val(no_rek);
    modal.find('.modal-body input#jmlhnarik').val(jmlh_penarikan);
    modal.find('.modal-body form-action').val(link);
  })
</script>

{{-- Penarikan Decline --}}
<script>
  $('#modal-decline-penarikan').on('show.bs.modal', function (event){

    var button = $(event.relatedTarget)
    var id_narik = button.data('idnarik')
    var id_user = button.data('iduser')
    var nis = button.data('nis')
    var nama_bank = button.data('namabank')
    var akun_bank = button.data('akunbank')
    var no_rek = button.data('norek')
    var jmlh_penarikan = button.data('jumlah')
    var link = button.data('link')

    var modal = $(this)
    modal.find('.modal-body input#user_id').val(id_user);
    modal.find('.modal-body input#narik_id').val(id_narik);
    modal.find('.modal-body input#nis').val(nis);
    modal.find('.modal-body input#namabank').val(nama_bank);
    modal.find('.modal-body input#akunbank').val(akun_bank);
    modal.find('.modal-body input#norek').val(no_rek);
    modal.find('.modal-body input#jmlhnarik').val(jmlh_penarikan);
    modal.find('.modal-body form-action').val(link);

    
  })
</script>

{{-- End Validasi Penarikan --}}

 

{{-- Verify Akun --}}
<script>
  $('#modal-verify').on('show.bs.modal', function (event){

    var button = $(event.relatedTarget)
    var iduser = button.data('iduser')
    var nama = button.data('nama')
    var nis = button.data('nis')
    var email = button.data('email')
    var link = button.data('link') 

    var modal = $(this)
    modal.find('.modal-body input#user_id').val(iduser);
    modal.find('.modal-body input#users_id').val(iduser);
    modal.find('.modal-body input#nama').val(nama);
    modal.find('.modal-body input#nis').val(nis);
    modal.find('.modal-body input#email').val(email);
    modal.find('.modal-body form-action').val(link);

    
  })
</script>

    {{-- End Verify Akun --}}

    <script>
      function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
      }
      </script>
 
    @stack('custom-script')
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <script src="https://kit.fontawesome.com/d480614dc5.js" crossorigin="anonymous"></script>

    {{-- sweet alert --}}
    @include('sweetalert::alert')


              @stack('custom-script')
              <!-- AdminLTE App -->
              <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
              <!-- Icon -->
              <script src="https://kit.fontawesome.com/d480614dc5.js" crossorigin="anonymous"></script>

              <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
              <!-- Bootstrap 4 -->
              <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
              <!-- DataTables  & Plugins -->
              <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
              <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
              <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
              <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
              <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
              <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
              <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
              <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
              <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
              <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
              <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
              <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
              <!-- AdminLTE App -->
              <script src="{{ asset('assets/dist/js/adminlte.min.js')}}"></script>
              <!-- AdminLTE for demo purposes -->
              <script src="{{ asset('assets/dist/js/demo.js')}}"></script>
              <!-- Page specific script -->
          <script>
            $(function () {
              $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false, 
                
              }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
              $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
              });
            });
          </script>
    </body>
</html>
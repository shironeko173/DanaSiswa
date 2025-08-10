<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Dashboard User')</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href={{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}>
  <link rel="stylesheet" href={{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}>
  <link rel="stylesheet" href={{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}>

  {{-- FAQ --}}
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href={{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}>
  @stack('custom-css')
   <!-- Theme style -->
   <link rel="stylesheet" href={{ asset('assets/dist/css/adminlte.min.css') }}>
    
   {{-- <style type="text/css">
    .alert-fixed {
    position: absolute;
    float: left; 
    top: 0px; 
    text-align: center;
    left: 0px; 
    width: 50%;
    z-index:9999; 
    border-radius:0px
}
  </style> --}}

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src={{ asset('assets/dist/img/logo-removebg-preview.png') }} alt="AdminLTELogo" height="60" width="60">
  </div>

  @include('user.layouts.nav-header')
  @include('user.layouts.sidebar')
  @include('sweetalert::alert')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>

  @include('user.layouts.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper --> 

<!-- jQuery -->
<script src={{ asset('assets/plugins/jquery/jquery.min.js') }}></script>
@stack('custom-script')
<!-- AdminLTE App -->
<script src={{ asset('assets/dist/js/adminlte.js') }}></script>
<!-- Icon -->
<script src="https://kit.fontawesome.com/d480614dc5.js" crossorigin="anonymous"></script>

<script src={{ asset('assets/plugins/jquery/jquery.min.js') }}></script>
<!-- Bootstrap 4 -->
<script src={{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
<!-- DataTables  & Plugins -->
<script src={{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}></script>
<script src={{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}></script>
<script src={{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}></script>
<script src={{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}></script>
<script src={{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}></script>
<script src={{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}></script>
<script src={{ asset('assets/plugins/jszip/jszip.min.js') }}></script>
<script src={{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}></script>
<script src={{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}></script>
<script src={{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}></script>
<script src={{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}></script>
<script src={{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}></script>
<!-- AdminLTE App -->
<script src={{ asset('assets/dist/js/adminlte.min.js')}}></script>
<!-- AdminLTE for demo purposes -->
<script src={{ asset('assets/dist/js/demo.js')}}></script>
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

<style type="text/css">
  body{margin-top:20px;}
  .section_padding_130 {
      padding-top: 130px;
      padding-bottom: 130px;
  }
  .faq_area {
      position: relative;
      z-index: 1;
      background-color: #f5f5ff;
  }
  
  .faq-accordian {
      position: relative;
      z-index: 1;
  }
  .faq-accordian .card {
      position: relative;
      z-index: 1;
      margin-bottom: 1.5rem;
  }
  .faq-accordian .card:last-child {
      margin-bottom: 0;
  }
  .faq-accordian .card .card-header {
      background-color: #ffffff;
      padding: 0;
      border-bottom-color: #ebebeb;
  }
  .faq-accordian .card .card-header h6 {
      cursor: pointer;
      padding: 1.75rem 2rem;
      color: #3f43fd;
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -ms-grid-row-align: center;
      align-items: center;
      -webkit-box-pack: justify;
      -ms-flex-pack: justify;
      justify-content: space-between;
  }
  .faq-accordian .card .card-header h6 span {
      font-size: 1.5rem;
  }
  .faq-accordian .card .card-header h6.collapsed {
      color: #070a57;
  }
  .faq-accordian .card .card-header h6.collapsed span {
      -webkit-transform: rotate(-180deg);
      transform: rotate(-180deg);
  }
  .faq-accordian .card .card-body {
      padding: 1.75rem 2rem;
  }
  .faq-accordian .card .card-body p:last-child {
      margin-bottom: 0;
  }
  
  @media only screen and (max-width: 575px) {
      .support-button p {
          font-size: 14px;
      }
  }
  
  .support-button i {
      color: #3f43fd;
      font-size: 1.25rem;
  }
  @media only screen and (max-width: 575px) {
      .support-button i {
          font-size: 1rem;
      }
  }
  
  .support-button a {
      text-transform: capitalize;
      color: #2ecc71;
  }
  @media only screen and (max-width: 575px) {
      .support-button a {
          font-size: 13px;
      }
  }
  
  </style>
  
  <script type="text/javascript">
  
  </script>

</body>
</html>
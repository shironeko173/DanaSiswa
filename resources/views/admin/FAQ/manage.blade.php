@extends('admin.layouts.master')
@section('title','FAQ')
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
      <div class="card-body">
          @if (session()->has('success'))
            <div class="alert alert-primary" role="alert">
              {{ session('success')}}
            </div>
          @endif
            <!-- general form elements -->
            <div class="card-body">
              <form action="/faq/kelola-faq">
              <div class="card-tools d-flex float-right mb-3">
                <div class="input-group input-group-sm" style="width: 300px;">
                  <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ request('search')}}">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div> 
              </form>
              </div>
      </div>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Pertanyaan</th>
                  <th>Jawaban</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($faqs as $faq)
                      
                  <tr>
                    <td>{{$faq->question}}</td>
                    <td>{{$faq->answer}}</td>
                    <td>
                      <a href="/faq/edit/{{$faq->slug}}" class="badge bg-success"><i class="fa-solid fa-pen"></i></a>
                      <form action="/faq/hapus/{{$faq->slug}}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin untuk menghapus FAQ?')"><i class="fa-solid fa-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-center">{{$faqs->links()}}</div>
            </div>
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
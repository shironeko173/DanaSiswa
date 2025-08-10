@extends('admin.layouts.master')
@section('title','Berita')
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
<div class="card card-solid">
  <div class="card-body">
    <div class="card-footer">
      <a href="/berita/kelola-berita" class="btn btn-primary"><i class="fa-solid fa-arrow-left-long p-1"></i>Kembali</a>
      <a href="/berita/edit/{{$post->slug}}" class="btn btn-success"><i class="fa-solid fa-pen p-1"></i>Edit</a>
      <form action="/berita/hapus/{{$post->slug}}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger border-0" onclick="return confirm('Apakah anda yakin untuk menghapus berita?')"><i class="fa-solid fa-trash-can p-1"></i>Delete</button>
      </form>
    </div>
    <div class="row">
      <h3 class="d-inline-block p-3">{{$post->title}}</h3>
    </div>
    <div class="row">
        
      <div class="col-10 ">
        <img src="{{asset('uploads/'.$post->image)}}" class="product-image p-2">
    
        <ul class="list-group list-group-horizontal p-3 ">
          <li class="list-group-item"><i class="fa-solid fa-user p-1"></i>{{$post->user->nama}}</li>
          <li class="list-group-item">{{$post->category->name}}</li>
        </ul>
      
        <div class="content p-3">
          {!!$post->body!!}
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
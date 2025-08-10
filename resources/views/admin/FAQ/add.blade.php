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
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah FAQ</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/faq/tambah" method="POST" name="addfaq" >
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="question">Pertanyaan</label>
                    <input type="text" class="form-control  @error('question') is-invalid @enderror" id="question" name="question" placeholder="Masukkan Pertanyaan" value="{{ old('question')}}">
                    @error('question')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="answer">Jawaban</label>
                    @error('answer')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <textarea class="form-control" id="answer" name="answer" rows="6" >{{ old('answer')}}</textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tambah FAQ</button>
                  <button class="btn btn-danger" onclick="Clear()">Hapus</button>
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection



<script>
  function Clear() {
      document.addfaq.reset();

  }
</script>

@section('ck-editor')
  <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                    console.error( error );
            } );
  </script>

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
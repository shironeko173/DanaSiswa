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
    <div class="row">
        <div class="card-body">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Berita</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/berita/ubah/{{$post->slug}}" method="POST" name="editnews" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Judul Berita</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Masukkan Judul" value="{{ old('title',$post->title)}}">
                    @error('title')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                    @enderror
                  </div>
                  {{-- <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Masukkan Slug" value="{{old('slug') }}">
                  </div> --}}
                  <div class="form-group">
                    <label for="slug">Category</label>
                    <select class="custom-select form-control-border" id="category_id" name="category_id">
                      @foreach ($categories as $category)
                        @if (old('category_id',$post->category_id) == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name}}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->name}}</option>
                        @endif
                      @endforeach
                      
                    </select>
                  </div>
                  <div class="form-group">
                    <div class="mb-3">
                      <label for="image" class="form-label">Gambar Sampul Berita</label>
                      <input type="hidden" name="oldImage" value="{{$post->image}}">
                      <img src="{{asset('uploads/'.$post->image)}}" class="img-preview img-fluid mb-3 mt-2 col-sm-6 d-block">
                      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                      @error('image')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                      @enderror
                    </div>
                  <div class="form-group">
                    <label for="newsContent">Isi Berita</label>
                    @error('body')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <textarea class="form-control" id="body" name="body" rows="6" >{{ old('body',$post->body)}}</textarea>
                  </div>
                  
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Edit Berita</button>
                  <a href="/berita/kelola-berita" class="btn btn-secondary"><i class="fa-solid fa-arrow-left-long p-1"></i>Kembali</a>
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection

<script>
    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display ='block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
          imgPreview.src = oFREvent.target.result;
        }

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
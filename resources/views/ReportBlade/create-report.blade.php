@extends('Layouts.main-layout')
@section('title', 'Multiflower Report System')

@section('header')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="/admin-assets/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/admin-assets/dist/css/adminlte.min.css">
<!-- summernote -->
<link rel="stylesheet" href="/admin-assets/plugins/summernote/summernote-bs4.min.css">
<!-- CodeMirror -->
<link rel="stylesheet" href="/admin-assets/plugins/codemirror/codemirror.css">
<link rel="stylesheet" href="/admin-assets/plugins/codemirror/theme/monokai.css">
<!-- SimpleMDE -->

@endsection

@section('compose-nav-active', 'active')

@section('page-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Compose</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/Multiflower-Report-System/home-page">Home</a></li>
            <li class="breadcrumb-item active">Compose</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <!-- /.col -->
        <div class="col-md-12">

          <form class="" action="/Multiflower-Report-System/store-report" method="post">
            @csrf
            <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <img src="/assets/img/edit.png" alt="" style="height:50px;">
                New Report
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <div class="form-group">
                <input class="form-control" placeholder="Subject:" name="ReportSubject" value="{{old('ReportSubject')}}" autofocus>
                <input type="hidden" class="form-control"  name="userId" value="{{Auth::user()->id}}">
                <input type="hidden" class="form-control"  name="userName" value="{{Auth::user()->name}}">
                <input type="hidden" class="form-control"  name="userEmail" value="{{Auth::user()->email}}">
                 <div class="text-danger">{{$errors->first('ReportSubject')}}</div>
              </div>

              <div class="form-group">
                  <textarea id="summernote" class="form-control" name="ReportBody" rows="10" cols="50" autofocus placeholder="Write Your Report Here..." >
                    {{old('ReportBody')}}
                  </textarea>
              </div>


            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <div class="float-right">
                <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
              </div>
              <a href="/Multiflower-Report-System/home-page" type="reset" class="btn btn-danger"><i class="fas fa-times"></i> Discard</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
         </form>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection

@section('footer')
<!-- jQuery -->
<script src="/admin-assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin-assets/dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="/admin-assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin-assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Add text editor
    $('#summernote').summernote({
      height: 300,
    });
  });
</script>
@endsection

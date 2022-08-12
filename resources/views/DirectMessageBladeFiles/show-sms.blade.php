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

@section('direct-message-nav-active', 'active')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Direct Message</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Direct Message</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="container">

      <div class="container-fluid">
        <!-- Left col -->
        <section class="col-12 connectedSortable">

          <!-- DIRECT CHAT -->
          <div class="card direct-chat direct-chat-primary" style="height:100%">
            <div class="card-header">
              <h3 class="card-title">Direct Chat</h3>

              <div class="card-tools">

                <a  href="/Multiflower-Report-System/direct-message-home-page"  class="btn btn-tool" title="Contacts" >
                  <i class="fas fa-reply"></i>
                </a>
                <a href="/Multiflower-Report-System/home-page" type="button" class="btn btn-tool" >
                  <i class="fas fa-times"></i>
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">


                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-left">Senser Name</span>
                    <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="/admin-assets/dist/img/user1-128x128.jpg" alt="message user image">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    Tex Here
                  </div>
                  <!-- /.direct-chat-text -->
                  <div class="direct-chat-text">
                    Tex Here
                  </div>
                  <div class="direct-chat-text">
                    Tex Here
                  </div>
                </div>
                <!-- /.direct-chat-msg -->


                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-right">Receiver Name</span>
                    <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="/admin-assets/dist/img/user3-128x128.jpg" alt="message user image">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                   Receiver Text
                  </div>
                  <div class="direct-chat-text">
                   Receiver Text
                  </div>
                  <div class="direct-chat-text">
                   Receiver Text
                  </div>
                  <div class="direct-chat-text">
                   Receiver Text
                  </div>
                  <div class="direct-chat-text">
                   Receiver Text
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->


              </div>
              <!--/.direct-chat-messages-->


            </div>
            <!-- /.card-body -->
            <!-- /.col -->
            <div class="col-md-12">

              <form class="" action="/Multiflower-Report-System/store-report" method="post">
                @csrf
                <div class="card card-primary card-outline">
                <!-- /.card-header -->
                <div class="card-body">

                <div class="footer">
                  <div class="form-group">
                      <textarea id="summernote" class="form-control" name="ReportBody" rows="10" cols="50" autofocus placeholder="Write Your Report Here..." autofocus>
                        {{old('ReportBody')}}
                      </textarea>
                  </div>
                  <div class="text-danger">{{$errors->first('ReportBody')}}</div>

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
            <!-- /.card-footer-->
          </div>
          <!--/.direct-chat -->
        </section>
        <!-- /.Left col -->

      </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
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
      height: 100,
    });
  });
</script>
@endsection

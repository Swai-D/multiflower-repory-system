@extends('Layouts.main-layout')
@section('title', 'Multiflower Report System')

@section('header')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="/admin-assets/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/admin-assets/dist/css/adminlte.min.css">
<link rel="stylesheet" href="/admin-assets/my-css/print.css">
@endsection

@section('my-report-nav-active', 'active')

@section('page-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Read Report</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/Multiflower-Report-System/home-page">Home</a></li>
            <li class="breadcrumb-item active">Read Report</li>
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
        @foreach($report as $report)
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Read Report</h3>

            <div class="card-tools">
              <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
              <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0" id="printMe">
            <div class="mailbox-read-info">
              <h5>{{$report->ReportSubject}}</h5>
              <h6>From: {{$report->userEmail}}
                <span class="mailbox-read-time float-right">{{$report->created_at->diffForHumans()}}</span></h6>
            </div>
            <!-- /.mailbox-read-info -->

            <!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
              {!! $report->ReportBody !!}
            </div>
            <!-- /.mailbox-read-message -->
          </div>
          <!-- /.card-body -->
          <!-- /.card-footer -->
          <div class="card-header">
            <h3 class="card-title">Comment(s)</h3>
         </div>
          <!-- /.card-footer -->
          <div class="col-md-9">
            <div class="card-body">
              @foreach($report->comments as $comment)
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{$comment->user->avatar}}" alt="user image">
                        <span class="username">
                          <a href="#">{{$comment->user->name}}</a>
                        </span>
                        <span class="description">Shared Public Reply - {{$comment->created_at->diffForHumans()}}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                      {{$comment->body}}
                      </p>
                    </div>
                    <!-- /.post -->

                  </div>

                </div>
                <!-- /.tab-content -->
                <hr>
              @endforeach

              <!-- Post -->
              <div class="tab-content">
                <div class="active tab-pane" id="activity">

                  <!-- Post -->
                  <div class="post">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="{{Auth::user()->avatar}}" alt="User Image">
                      <span class="username">
                        <a href="#">{{Auth::user()->name}}</a>
                      </span>
                      <span class="description">Reply to {{$report->userName}} Report</span>
                    </div>
                    <!-- /.user-block -->

                    <form class="form-horizontal" action="/Multiflower-Report-System/direct-message-reply-sms/{{$report->id}}" method="post">
                      @csrf
                      <div class="input-group input-group-sm mb-0">
                        <input type="text" class="form-control form-control-sm" placeholder="Reply..." name="comment_body">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-success">Send</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="text-danger">{{$errors->first('body')}}</div>

                  <!-- /.post -->
                </div>

              </div>
              <!-- /.post -->

              </div><!-- /.card-body -->

          </div>
          <!-- /.card-footer -->
          <div class="card-footer">
            <div class="float-left">
              <a href="/Multiflower-Report-System/home-page" class="btn btn-primary btn-sm"><i class="fas fa-reply" ></i> Back</a>

              @if(Auth::user()->userType == 'managerAccess' || Auth::user()->userType == 'admin')
                <a href="/Multiflower-Report-System/manager-delete-staff-report-page/{{$report->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash" ></i> Delete</a>
              @endif

            </div>

          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
        @endforeach
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
<script src="/admin-assets/dist/js/pages/swai.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin-assets/dist/js/demo.js"></script>
@endsection

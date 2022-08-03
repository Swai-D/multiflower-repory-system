@extends('Layouts.main-layout')
@section('title', 'Multiflower Report System')

@section('header')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="/admin-assets/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/admin-assets/dist/css/adminlte.min.css">
@endsection

@section('my-report-nav-active', 'active')

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
            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
        @foreach($report as $report)
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Read Mail</h3>

            <div class="card-tools">
              <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
              <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="mailbox-read-info">
              <h5>{{$report->ReportSubject}}</h5>
              <h6>From: {{$report->userEmail}}
                <span class="mailbox-read-time float-right">{{$report->created_at->format('d M Y, h:m')}}</span></h6>
            </div>
            <!-- /.mailbox-read-info -->
            <div class="mailbox-controls with-border text-center">
              <div class="btn-group">
                <a href="" class="btn btn-danger btn-sm" data-container="body" title="Delete">
                  <i class="far fa-trash-alt"></i>
                </a>
                <!-- <a href="/Multiflower-Report-System/reply-report"  class="btn btn-default btn-sm" data-container="body" title="Reply" style="color:gray;">
                  <i class="fas fa-reply"></i>
                </a> -->
                <!-- <a  href="" class="btn btn-primary btn-sm" data-container="body" title="Forward">
                  <i class="fas fa-share"></i>
                </a> -->
              </div>
              <!-- /.btn-group -->
              <button type="button" class="btn btn-success btn-sm" title="Print">
                <i class="fas fa-print"></i>
              </button>
            </div>
            <!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
              {!! $report->ReportBody !!}
            </div>
            <!-- /.mailbox-read-message -->
          </div>
          <!-- /.card-body -->

          <!-- /.card-footer -->
          <div class="card-footer">
            <div class="float-right">
              <!-- <a href="/Multiflower-Report-System/direct-message-show-page" class="btn btn-default"><i class="fas fa-reply" ></i> Reply</a> -->
              <!-- <a href="/Multiflower-Report-System/direct-message-home-page" class="btn btn-default"><i class="fas fa-share" style="color:blue;"></i> Forward</a> -->
            </div>
            <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
            <button type="button" class="btn btn-success"><i class="fas fa-print"></i> Print</button>
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
<!-- AdminLTE for demo purposes -->
<script src="/admin-assets/dist/js/demo.js"></script>
@endsection

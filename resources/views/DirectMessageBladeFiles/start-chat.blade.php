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

@section('direct-message-nav-active', 'active')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
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
                    <span class="direct-chat-name float-left">{{Auth::user()->name}}</span>
                    <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                    <span class="direct-chat-timestamp float-right">{{date('d M h:s')}}</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="/admin-assets/dist/img/user1-128x128.jpg" alt="message user image">
                  <!-- /.direct-chat-img -->
                  @foreach($receiver as $receiver)
                    <div class="direct-chat-text">
                    Hey {{Auth::user()->name}} start Conversation with {{$receiver->name}}
                    </div>

                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->

              </div>
              <!--/.direct-chat-messages-->


            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <form action="/Multiflower-Report-System/direct-message-send-sms" method="post">
                @csrf
                <div class="input-group">
                  <input type="text" name="text" placeholder="Type Message ..." class="form-control">
                  <input type="hidden" name="senderId" class="form-control" value="{{Auth::user()->id}}">
                  <input type="hidden" name="senderName" class="form-control" value="{{Auth::user()->name}}">
                  <input type="hidden" name="senderImage" class="form-control" value="{{Auth::user()->avatar}}">


                  <input type="hidden" name="receiver_id" class="form-control" value="{{$receiver->id}}">
                  <input type="hidden" name="receiverName" class="form-control" value="{{$receiver->name}}">
                  <input type="hidden" name="receiverImage" class="form-control" value="{{$receiver->avatar}}">
                @endforeach
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-primary">Send</button>
                  </span>
                </div>
              </form>
            </div>
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
<!-- AdminLTE for demo purposes -->
<script src="/admin-assets/dist/js/demo.js"></script>
@endsection

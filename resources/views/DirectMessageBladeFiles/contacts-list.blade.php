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
          <div class="card direct-chat direct-chat-primary">
            <div class="card-header">
              <h3 class="card-title">Direct Chat</h3>
              <br>
              <div class="card-tools">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Find Name ...." class="form-control">
                    <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">


              <!-- Contacts are loaded here -->
              <div class="">
                <ul class="contacts-list" style="background-color: gray; ">
                  @forelse($users as $user)
                  <li>
                    <a href="/Multiflower-Report-System/direct-message-read-sms/{{$user->id}}">
                      <img class="contacts-list-img" src="/admin-assets/dist/img/user1-128x128.jpg" alt="User Avatar">

                      <div class="contacts-list-info">
                        <span class="contacts-list-name">
                          {{$user->receiverName}}
                          <small class="contacts-list-date float-right">2/28/2015</small>
                        </span>
                        <span class="contacts-list-msg"><b>You: </b>{!! \Illuminate\Support\Str::limit($user->text, 10, '...') !!}</span>
                      </div>
                      <!-- /.contacts-list-info -->
                    </a>
                  </li>

                  @endforeach

                    @foreach($newConversation as $newConversation)

                    <li>
                      <a href="/Multiflower-Report-System/direct-message-create-sms/{{$newConversation->id}}">
                        <img class="contacts-list-img" src="/admin-assets/dist/img/user2-160x160.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            {{$newConversation->name}}
                            <small class="contacts-list-date float-right">{{date('d/m/y')}}</small>
                          </span>
                          <span class="contacts-list-msg">Start Conversation with {{$newConversation->name}}...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>

                    @endforeach

                
                </ul>
                <!-- /.contacts-list -->
              </div>
              <!-- /.direct-chat-pane -->
            </div>

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

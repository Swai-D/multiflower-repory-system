@extends('Layouts.main-layout')
@section('title', 'Multiflower Report System')

@section('header')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="/admin-assets/plugins/fontawesome-free/css/all.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="/admin-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/admin-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/admin-assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/admin-assets/dist/css/adminlte.min.css">
@endsection

@section('manager-nav-active', 'active')

@section('page-content')

@foreach($user as $user)

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{$user->name}}'s Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/Multiflower-Report-System/home-page">Home</a></li>
            <li class="breadcrumb-item active">Staff Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  @if(session()->has('Message'))
    <div class="alert alert" role = "alert">
      <p class="lead text-center" style="color: #f33155">
        {{session()->get('Message')}}
      </p>
    </div>
  @endif

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="{{$user->avatar}}"
                     alt="User profile picture" style="width:100px; height:100px;">
              </div>

              <h3 class="profile-username text-center">{{$user->name}}</h3>

              <p class="text-muted text-center">{{$user->section}}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Report(s) </b> <a class="float-right">{{$userReportsCount}}</a>
                </li>
                <li class="list-group-item">
                  <b>Section</b> <a class="float-right">{{$user->section}}</a>
                </li>
                <li class="list-group-item">
                  <b>Join</b> <a class="float-right">{{$user->created_at->diffForHumans()}}</a>
                </li>
              </ul>

              <a href="/Multiflower-Report-System/manager-home-page" class="nav-link btn btn-success btn-block"><b><i class="fas fa-reply"></i> Back to Staff Table</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fa fa-eye" style="color:green"></i> Staff Details</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab"><i class="fa fa-envelope" style="color:blue"></i> Staff Reports</a></li>
                <li class="nav-item"><a class="nav-link" href="#edit" data-toggle="tab"><i class="fa fa-edit" style="color:blue"></i> Edit Staff Details</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">{{$user->name}}'s Details</h3>

                    </div>

                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Description</th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td>Full Name</td>
                            <td>
                              <b>{{$user->name}}</b>
                            </td>

                          </tr>
                          <tr>
                            <td>2.</td>
                            <td>Section</td>
                            <td>
                              <b>{{$user->section}}</b>
                            </td>

                          </tr>
                          @if($user->status == 'Not Authorized Yet')
                          <tr>
                            <td>3.</td>
                            <td>Status</td>
                            <td>
                             <b><span style="color:#f33155">{{$user->status}}</span></b>
                            </td>
                          </tr>
                          @else
                          <tr>
                            <td>3.</td>
                            <td>Status</td>
                            <td>
                            <b>{{$user->status}}</b>
                            </td>
                          </tr>
                          @endif
                          <tr>
                            <td>4.</td>
                            <td>Reports</td>
                            <td>
                            <b>{{$userReportsCount}}</b>
                            </td>

                          </tr>

                          <tr>
                            <td>5.</td>
                            <td>User Type</td>
                            <td>
                              @if($user->userType == 'managerAccess')
                               <b>Manager Access</b>
                              @else
                              <b>Normal Staff Access</b>
                              @endif
                            </td>

                          </tr>

                          <tr>
                            <td>6.</td>
                            <td>Join</td>
                            <td>
                              <b>{{$user->created_at->diffForHumans()}}</b>
                            </td>

                          </tr>

                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>

                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>N0.</th>

                        <th >Report(s) List</th>

                      </tr>

                      </thead>
                      <tbody>
                      @foreach($userReports as $myReports)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td class="mailbox-name"><a href="/Multiflower-Report-System/view-report/{{$myReports->id}}">{{$myReports->ReportSubject}}</a></td>

                        </tr>
                        @endforeach

                      </tbody>
                      <tfoot>
                        <tr>
                          <th>N0.</th>

                          <th >Report(s) List</th>

                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="edit">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Edit {{$user->name}}'s Details</h3>
                      <div class="card-tools">

                       @if($user->userType == 'managerAccess' || $user->userType == 'admin')
                        <a href="/Multiflower-Report-System/manager-remove-me-admin/{{$user->id}}" class="btn btn-danger " >
                           <img src="/assets/img/unauthorized-person.png" alt="" style="height:25px;"> Remove {{$user->name}} an Admin ?
                        </a>
                        @else
                        <a href="/Multiflower-Report-System/manager-make-me-admin-access/{{$user->id}}" class="btn btn-success " >
                           <img src="/assets/img/unauthorized-person.png" alt="" style="height:25px;"> Make {{$user->name}} an Admin ?
                        </a>
                        @endif
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                    <form class="" action="/Multiflower-Report-System/manager-update-staff-page/{{$user->id}}" method="post">
                      @csrf
                      <table class="table ">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Description</th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td>Full Name</td>
                            <td>
                              <input type="text" class="form-control" name="name" value="{{old('name') ?? $user->name}}">
                            </td>

                          </tr>
                          <tr>
                            <td>2.</td>
                            <td>Email</td>
                            <td>
                              <input type="email" class="form-control" name="email" value="{{old('email') ?? $user->email}}">
                            </td>

                          </tr>
                          <tr>
                            <td>3.</td>
                            <td>Section</td>
                            <td>
                              <select name="section" class="form-control select2" style="width: 100%;">
                                 <option value="Manager"  {{ $user->section == "Manager" ? 'selected' : '' }}>Manager</option>
                                 <option value="Administrator"  {{ $user->section == "Administrator" ? 'selected' : '' }}>Administrator</option>
                                 <option value="Field Officer"  {{ $user->section == "Field Officer" ? 'selected' : '' }}>Field Officer</option>
                                 <option value="Quality Control"  {{ $user->section == "Quality Control" ? 'selected' : '' }}>Quality Control</option>
                                 <option value="Stock Seed Selection"  {{ $user->section == "Stock Seed Selection" ? 'selected' : '' }}>Stock Seed Selection</option>
                                 <option value="Store Keeper"  {{ $user->section == "Store Keeper" ? 'selected' : '' }}>Store Keeper</option>
                               </select>
                            </td>

                          </tr>
                          <tr>
                            <td>4.</td>
                            <td>Status</td>
                            <td>
                              <select name="status" class="form-control select2" style="width: 100%;">
                                 <option value="Not Authorized Yet" {{ $user->status == 'Not Authorized Yet ' ? 'selected' : '' }}>Not Authorized Yet</option>
                                 <option value="Authorized" {{ $user->status == 'Authorized' ? 'selected' : '' }}>Authorized</option>
                               </select>
                            </td>
                          </tr>

                          <tr>
                            <td>5.</td>
                            <td>User Type</td>
                            <td>
                              @if($user->userType == 'managerAccess')
                               <b>Manager Access</b>
                              @else
                              <b>Normal Staff Access</b>
                              @endif
                            </td>
                          </tr>

                          <br>
                          <tr>
                            <td colspan="2">
                            <a href="/Multiflower-Report-System/manager-home-page" class="btn btn-danger ">Cancel</a>
                            </td>
                            <td>
                              <button type="submit" class="btn btn-success ">Update</button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </form>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endforeach

@endsection

@section('footer')
<!-- jQuery -->
<script src="/admin-assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/admin-assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/admin-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/admin-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/admin-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/admin-assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/admin-assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/admin-assets/plugins/jszip/jszip.min.js"></script>
<script src="/admin-assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/admin-assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/admin-assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/admin-assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/admin-assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin-assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin-assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection

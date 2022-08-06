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
        <div class="col-1">

        </div>
        <div class="col-sm-9">
          @if(session()->has('Message'))
            <div class="alert alert" role = "alert">
              <p class="lead text-center" style="color: #f33155">
                {{session()->get('Message')}}
              </p>
            </div>
          @else
          <h1 class="justify-content-center"style="color:red;">Are you Sure you want to delete {{$user->name}}'s Records ?</h1>
          @endif
        </div>
        <div class="col-sm-2">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/Multiflower-Report-System/home-page">Home</a></li>
            <li class="breadcrumb-item active">Delete Staff</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>



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
                     src="/admin-assets/dist/img/default.png"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{$user->name}}</h3>

              <p class="text-muted text-center">{{$user->section}}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Reports </b> <a class="float-right">{{$userReportsCount}}</a>
                </li>
                <li class="list-group-item">
                  <b>Section</b> <a class="float-right">{{$user->section}}</a>
                </li>
                <li class="list-group-item">
                  <b>Join</b> <a class="float-right">{{$user->created_at->format('d M, Y')}}</a>
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
                            <td>Email </td>
                            <td>
                              <b>{{$user->email}}</b>
                            </td>

                          </tr>

                          <tr>
                            <td>3.</td>
                            <td>Section</td>
                            <td>
                              <b>{{$user->section}}</b>
                            </td>

                          </tr>
                          @if($user->status == 'Not Authorized Yet')
                          <tr>
                            <td>4.</td>
                            <td>Status</td>
                            <td>
                             <b><span style="color:#f33155">{{$user->status}}</span></b>
                            </td>
                          </tr>
                          @else
                          <tr>
                            <td>4.</td>
                            <td>Status</td>
                            <td>
                            <b>{{$user->status}}</b>
                            </td>
                          </tr>
                          @endif
                          <tr>
                            <td>5.</td>
                            <td>Reports</td>
                            <td>
                            <b>{{$userReportsCount}}</b>
                            </td>

                          </tr>

                          <tr>
                            <td>6.</td>
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
                            <td>7.</td>
                            <td>Join</td>
                            <td>
                              <b>{{$user->created_at->format('d M, Y')}} at   {{$user->created_at->format('H:s')}}</b>
                            </td>

                          </tr>

                        </tbody>

                      </table>
                    </div>
                    <!-- /.card-body -->

                  </div>
                  <b>Note:</b>
                  <p class=""><span style="color:red"><b>*</b></span> If you Delete <span style="color:red;">{{$user->name}}'s</span> Records, All His/Her Information and Reports will be Permanet Deleted <span style="color:red"><b>*</b></span></p>
                  <div class="row">
                    <div class="col-6">
                    </div>
                    <div class="col-3 pull-right">
                      <a href="/Multiflower-Report-System/manager-home-page" class="btn btn-success"><i class="fa fa-reply"></i> Cancel Any Way</a>
                    </div>
                    <div class="col-3 pull-right">
                      <a href="/Multiflower-Report-System/manager-delete-staff/{{$user->id}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete Any Way</a>
                    </div>
                  </div>

                </div>
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

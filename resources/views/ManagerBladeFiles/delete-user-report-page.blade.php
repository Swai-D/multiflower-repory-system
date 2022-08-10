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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @foreach($userReport as $report)
    <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-3">

        </div>
        <div class="col-sm-6 justify-content-center">
          <h3  style="color:red;" class="text-center">Sure You Want to Delete {{$report->userName}} Report of {{$report->ReportSubject}} ?</h3>
        </div>
        <div class="col-sm-3">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/Multiflower-Report-System/home-page">Home</a></li>
            <li class="breadcrumb-item active">Delet Report</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Keep in Mind That</h3>

      </div>
      <div class="card-body">
        <p class="lead text-cen"><span style="color:red"><b>*</b> </span>If Delete This Report, <span style="color:red;">{{$report->ReportSubject}} by {{$report->userName}} </span>. You Will Not Be Able To Recover It Again<span style="color:red"><b>*</b> </span></p>
      </div>
      <div class="card-body p-0" id="printMe">
        <div class="mailbox-read-info">
          <h5>{{$report->ReportSubject}}</h5>
          <h6>From: {{$report->userEmail}}
            <span class="mailbox-read-time float-right">{{$report->created_at->format("d F Y, h:i:s A", strtotime('+3 hours'))}}</span></h6>
        </div>
        <!-- /.mailbox-read-info -->

        <!-- /.mailbox-controls -->
        <div class="mailbox-read-message">
          {!! $report->ReportBody !!}
        </div>
        <!-- /.mailbox-read-message -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <div class="row">
          <div class="col-8">
            <a href="/Multiflower-Report-System/home-page" class="btn btn-primary " >
               <i class="fa fa-reply"></i> Back
            </a>
          </div>
          <div class="col-4">
            <a href="/Multiflower-Report-System/manager-delete-staff-report/{{$report->id}}" class="btn btn-danger float-right" >
              <i class="fa fa-trash"></i> Delete Any Way
            </a>
          </div>

        </div>
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->

@endforeach
</div>
<!-- /.content-wrapper -->
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
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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

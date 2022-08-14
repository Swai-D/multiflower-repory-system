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

@section('inbox-nav-active', 'active')

@section('page-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Inbox Report(s)</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/Multiflower-Report-System/home-page">Home</a></li>
            <li class="breadcrumb-item active">Inbox Report(s)</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  @if(session()->has('Message'))
     <div class="alert alert justify-content-center" role = "alert">
       <p class="lead text-center" style="color: #f33155">
         {{session()->get('Message')}}
       </p>
     </div>
 @endif
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <img src="/assets/img/notification.png" alt="" style="height:50px;">
                Inbox Report(s)
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>N0.</th>
                  <th >Report Subject</th>
                  <th>By</th>
                  <th>Date</th>
                </tr>

                </thead>
                <tbody>
                  @forelse($reports as $report)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td class="mailbox-name">
                      <a href="/Multiflower-Report-System/view-report/{{$report->id}}">{!! \Illuminate\Support\Str::limit($report->ReportSubject, 60, ' ...') !!} </a>
                      <br><br>
                      <!-- Post -->
                    @foreach($report->comments as $comment)
                    <a href="/Multiflower-Report-System/view-report/{{$report->id}}" class="link-black text-sm mr-2"><i class="fas fa-reply mr-1"></i> Replied By</a>
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{$comment->user->avatar}}" alt="user image">
                          <span class="username">
                            <a href="/Multiflower-Report-System/view-report/{{$report->id}}">{{$comment->user->name}}.</a>
                          </span>
                          <span class="description">Shared Reply - {{$comment->created_at->diffForHumans()}}</span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                          {!! \Illuminate\Support\Str::limit($comment->body, 50, ' ...') !!}
                        </p>

                      </div>
                      <!-- /.post -->
                      <hr>
                      @endforeach
                    </td>

                    <td>{{$report->userName}}</td>
                    <td>{{$report->created_at->diffForHumans()}}</td>
                  </tr>

                  @empty
                  @endforelse

                </tbody>
                <tfoot>
                  <tr>
                    <th>N0.</th>
                    <th >Report Subject</th>
                    <th>By</th>
                    <th>Date</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
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

    });
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

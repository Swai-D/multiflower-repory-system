<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Multiflower LTD | Staff Waiting Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin-assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin-assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="card-header text-center">
    <a href="/admin-assets/index2.html" class="h1"><b>Multiflower</b> LTD</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Report System</div>
   <br>
  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="/admin-assets/dist/img/default.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials">
      <div class="input-group">
        <input type="hidden" class="form-control" placeholder="Contact Your Manager to Login">

        <div class="input-group-append">
          <button type="button" class="btn">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center" style="color: #f33155">
    Welcome <span style="color: blue">{{Auth::user()->name}}</span>, Please Contact Your Manager To Authorize You To Use This System, Thank You !
  </div>
  <br>
  <div class="help-block text-center" style="color: #f33155">
    <a href="/Multiflower-Report-System/login-page" class="btn btn-success"> Already Contact Your Manager ?</a>
  </div>
  <br>
  <div class="lockscreen-footer text-center">
    Copyright &copy; {{date('M, Y')}} <b><a href="#" class="text-black">Multiflower LTD</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="/admin-assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Multiflower Report System  | Log in </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin-assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin-assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Multiflower</b> LTD</a>
        <a href="#" class="h3">Report System</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="/Multiflower-Report-System/manager-register-new-staff-store-page" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Full name" name="name" value="{{old('name')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>

          </div>
          <div class="text-danger">{{$errors->first('name')}}</div>

          <div class="form-group" >

            <select class="custom-select rounded-0" id="exampleSelectRounded0" name="section">
              <option selected disabled>--Choose Section--</option>
              <option value="Bwana Shamba"  {{ old('section') == "Bwana Shamba" ? 'selected' : '' }}>Bwana Shamba</option>
              <option value="Store Keeper"  {{ old('section') == "Store Keeper" ? 'selected' : '' }}>Store Keeper</option>
              <option value="Manager"  {{ old('section') == "Manager" ? 'selected' : '' }}>Manager</option>
            </select>
          </div>
          <div class="text-danger">{{$errors->first('section')}}</div>

          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
            <input type="hidden" class="form-control"  name="status" value="Authorized">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>

          </div>
          <div class="text-danger">{{$errors->first('email')}}</div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" value="{{old('password')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>

          </div>
          <div class="text-danger">{{$errors->first('password')}}</div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" value="{{old('password_confirmation')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>

          </div>
          <div class="text-danger">{{$errors->first('password_confirmation')}}</div>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="agreeTerms">
                 I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <br>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/admin-assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin-assets/dist/js/adminlte.min.js"></script>
</body>
</html>

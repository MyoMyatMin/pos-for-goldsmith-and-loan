<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <!-- AdminLTE -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>Management</b></a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      @if (session('errors'))
      <div class="alert alert-danger">
          {{ session('errors') }}
      </div>
      @endif
      <p class="login-box-msg">Sign in to start your session</p>

      <!-- Toggle button -->
      <button type="button" class="btn btn-outline-secondary btn-sm mb-2" onclick="toggleTestInfo()">
        <i id="test-eye-icon" class="fas fa-eye"></i> Show Test Accounts
      </button>

      <!-- Hidden test info -->
      <div id="test-info" class="alert alert-info text-left d-none">
        <strong>Test Accounts:</strong><br>
        <b>Admin Account:</b><br>
        <b>Email:</b> mcfly@gmail.com<br>
        <b>Password:</b> password<br><br>
        <b>Staff Account:</b><br>
        <b>Email:</b> amelia@gmail.com<br>
        <b>Password:</b> password
      </div>

      <form action="/login" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="col-lg-12 text-center">
            <button type="submit" class="btn btn-primary">Sign In</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
<script>
  function toggleTestInfo() {
    const infoBox = document.getElementById('test-info');
    const icon = document.getElementById('test-eye-icon');

    infoBox.classList.toggle('d-none');

    if (infoBox.classList.contains('d-none')) {
      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye');
    } else {
      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');
    }
  }
</script>

</body>
</html>

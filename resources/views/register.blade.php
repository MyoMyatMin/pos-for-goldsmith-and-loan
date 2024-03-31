@extends('layouts.home')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Panel</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
            <div class="card">
                <div class="card-body login-card-body">
                  <p class="login-box-msg">Create a new user</p>
                  <form action="/register" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="name" class="form-control" placeholder="Name" name="name">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                      </div>
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
                        <button type="submit" class="btn btn-primary text-center">Sign In</button>
                    </div>
                  </form>
            
                 
              </div>
            </div>
          
          
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

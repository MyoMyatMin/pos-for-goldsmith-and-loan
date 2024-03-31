@extends('layouts.home')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Mortgages Panel</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
                <h3 class="card-title">Mortgages</h3>
                <a href="/sales" class="btn btn-success" style="float: right">Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if (session('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif
          <form action="/sales/{{$sale->id}}/debt" method="POST">
            @csrf
            <input type="hidden" name="user_id"
            value="{{ auth()->user()->id }}">
            <div class="form-group">
                <label for="">Debt</label>
                <input type="text" class="form-control" name="debt" value="{{$sale->debt}}" disabled>
            </div>
           <div class="form-group">
            <label for="">Amount u want to pay</label>
            <input type="text" class="form-control" name="amt" >
           </div>
        <button type="submit" class="btn btn-success">Submit</button>
        </form>
            </div>
            </div>
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

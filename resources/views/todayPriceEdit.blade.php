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
                <h3 class="card-title">Today Price</h3>
                <a href="/mortgages" class="btn btn-success" style="float: right">Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if (session('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif
          <form action="/todayPrice/{{$goldPrice->id}}/edit" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Sixteen</label>
                <input type="text" class="form-control" name="sixteen" value="{{old('sixteen')}}">
            </div>
            <div class="form-group"> 
                 <label for="">Fifteen</label>
                <input type="text" class="form-control" name="fifteen" value="{{old('fifteen')}}"></div>
            <div class="form-group"> 
                 <label for="">Twelve</label>
                <input type="text" class="form-control" name="twelve" value="{{old('twelve')}}"></div>
          
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

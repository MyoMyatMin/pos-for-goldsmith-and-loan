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
                <a href="/mortgages" class="btn btn-success" style="float: right">Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if (session('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif
          <form action="/mortgages/create" method="POST">
            @csrf
            <input type="hidden" name="user_id"
            value="{{ auth()->user()->id }}">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
            </div>
            <div class="form-group"> 
                 <label for="">Address</label>
                <input type="text" class="form-control" name="address" value="{{old('address')}}"></div>
            <div class="form-group"> 
                 <label for="">items</label>
                <input type="text" class="form-control" name="items" value="{{old('items')}}"></div>
            <div class="form-group"> 
                 <label for="">Weight</label>
                <input type="text" class="form-control" name="weight" value="{{old('weight')}}"></div>
            <div class="form-group">
                <label for="">Amount</label>
                <input type="text" class="form-conreol" name="amount" value="{{old('amount')}}">
            </div>
            <div class="form-group">
                <label for="">Rate</label>
                <Select class="form-select form-select-sm" name="rate">
                    <option selected>Rate</option>
                    <option value="1.5">1.5</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </Select>
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

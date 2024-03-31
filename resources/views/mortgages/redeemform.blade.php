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
          <form action="/mortgages/{{$mortgages->id}}/redeemed" method="POST">
            @csrf
            <input type="hidden" name="user_id"
            value="{{ auth()->user()->id }}">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{$mortgages->name}}">
            </div>
            <div class="form-group"> 
                 <label for="">Address</label>
                <input type="text" class="form-control" name="address" value="{{$mortgages->address}}"></div>
            <div class="form-group"> 
                 <label for="">items</label>
                <input type="text" class="form-control" name="items" value="{{$mortgages->items}}"></div>
            <div class="form-group"> 
                 <label for="">Weight</label>
                <input type="text" class="form-control" name="weight" value="{{$mortgages->weight}}"></div>
            <div class="form-group">
                <label for="">Original Amount</label>
                <input type="text" class="form-control" name="amount" value="{{$mortgages->amount}}">
            </div>
            <div class="form-group">
                <label for="">Charge</label>
                <input type="text" class="form-control" name="charge" value="{{$charge}}">
            </div>
            <div class="form-group">
                <label for="">Total</label>
                <input type="text" class="form-control" name="total" value="{{$total}}">
            </div>
            <div class="form-group">
                <label for="">Original Date</label>
                <input type="text" class="form-control"  value="{{$mortgages->created_at}}" disabled>
            </div>
            <div class="form-group">
                <label for="">Interest Charge Date</label>
                <input type="text" class="form-control"  value="{{$mortgages->updated_at}}" disabled>
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

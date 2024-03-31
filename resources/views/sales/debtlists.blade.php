@extends('layouts.home')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sales Panel</h1>
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
                <h3 class="card-title">Debts</h3>
                <a href="/plainVouncher" class="btn btn-success" style="float: right">Create</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if (session('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif
            <table id="dishes" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Items</th>
                    <th>Price</th>
                    <th>Weight</th>
                    <th>လျော့တွက်</th>
                    <th>Quality</th>
                    <th>Amount</th>
                    <th>Purchase</th>
                    <th>Debt</th>
                    <th>Original Date</th>
                    <th>Action</th>
                  
                    
                </tr>
                </thead>
                <tbody>
                @foreach ($debts as $debt)
                    <tr >
                      <td>{{$debt->name}}</td>
                      <td>{{$debt->address}}</td>
                      <td>{{$debt->items}}</td>
                      <td>{{$debt->price}}</td>
                      <td>{{$debt->kyat ? $debt->kyat : 0}}K {{$debt->pay ? $debt->pay : 0}}P {{$debt->yway ? $debt->yway : 0}}Y</td>
                      <td>{{$debt->ytpay ? $debt->ytpay : 0}}P {{$debt->ytyway ? $debt->ytyway : 0}}Y</td>
                     <td>{{$debt->quality}}</td>
                      <td>{{$debt->amount}}</td>
                      <td>{{$debt->purchaseAmt}}</td>
                      <td>{{$debt->debt}}</td>
                      <td>{{date('Y-m-d',strtotime($debt->created_at))}}</td>
                      <td> 
                        <a style="height: 40px; margin-right: 10px;" href="/sales/{{$debt->id}}" class="btn btn-success">Details</a>
                        @if($debt->debt > 0)
                        <a href="/sales/{{$debt->id}}/debt" class="btn btn-warning" >Debt</a>
                        @endif
                        
                      </td>
                      
                    </tr>
                @endforeach
                </tbody>
                </table>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function () {
    $('#dishes').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
    });
});
</script>
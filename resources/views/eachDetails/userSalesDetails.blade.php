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
                <a href="/plainvouncher" class="btn btn-success" style="float: right">Create</a>
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
                    <th>Sold By</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($userSales as $sale)
                    <tr >
                      <td>{{$sale->name}}</td>
                      <td>{{$sale->address}}</td>
                      <td>{{$sale->items}}</td>
                      <td>{{$sale->price}}</td>
                      <td>{{$sale->kyat ? $sale->kyat : 0}}K {{$sale->pay ? $sale->pay : 0}}P {{$sale->yway ? $sale->yway : 0}}Y</td>
                      <td>{{$sale->ytpay ? $sale->ytpay : 0}}P {{$sale->ytyway ? $sale->ytyway : 0}}Y</td>
                     <td>{{$sale->quality}}</td>
                      <td>{{$sale->amount}}</td>
                      <td>{{$sale->purchaseAmt}}</td>
                      <td>{{$sale->debt}}</td>
                      <td>{{date('Y-m-d',strtotime($sale->created_at))}}</td>
                      <td> 
                        <a style="height: 40px; margin-right: 10px;" href="/sales/{{$sale->id}}" class="btn btn-success">Details</a>
                        @if($sale->debt > 0)
                        <a href="/sales/{{$sale->id}}/debt" class="btn btn-warning" >Debt</a>
                        @endif
                        
                      </td>
                      <td>{{$sale->user->name}}</td>
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
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
    $(function () {
    $('#dishes').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
    });
});
</script>
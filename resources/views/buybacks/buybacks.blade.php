@extends('layouts.home')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">buybacks Panel</h1>
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
                <h3 class="card-title">buybacks</h3>
                <a href="/buybacks/create" class="btn btn-success" style="float: right">Create</a>
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
                    <th>Amount</th>
                    <th>weight</th>
                    <th>Original Date</th>
                    <th>Received By</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($buybacks as $buyback)
                      <td>{{$buyback->name}}</td>
                      <td>{{$buyback->address}}</td>
                      <td>{{$buyback->items}}</td>
                      <td>{{$buyback->amount}}</td>
                      <td>{{$buyback->kyat ? $buyback->kyat : 0}}K {{$buyback->pay ? $buyback->pay : 0}}P {{$buyback->yway ? $buyback->yway : 0}}Y</td>
                      <td>{{date('Y-m-d',strtotime($buyback->created_at))}}</td>
                     <td>{{$buyback->user->name}}</td>
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
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
    });
});
</script>
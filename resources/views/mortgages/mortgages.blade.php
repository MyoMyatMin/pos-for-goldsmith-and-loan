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
                <a href="/mortgages/create" class="btn btn-success" style="float: right">Create</a>
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
                    <th>rate</th>
                    <th>weight</th>
                    <th>Original Date</th>
                    <th>Pay rate Date</th>
                   <th>Action</th>
                   <th>Received by</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($mortgages as $mortgage)
                    <tr class="{{$mortgage->confirmed ? 'table-danger' : 'table-success'}}">
                      <td>{{$mortgage->name}}</td>
                      <td>{{$mortgage->address}}</td>
                      <td>{{$mortgage->items}}</td>
                      <td>{{$mortgage->amount}}</td>
                      <td>{{$mortgage->rate}}</td>
                      <td>{{$mortgage->weight}}</td>
                      <td>{{date('Y-m-d',strtotime($mortgage->created_at))}}</td>
                      <td>{{date('Y-m-d',strtotime($mortgage->updated_at))}}</td>
                      <td>
                        <div class="form-row">
                          @if($mortgage->confirmed)
                            <p class="justify-content-center">Alreay Redeemed</p>
                          @else
                          <a style=" height: 40px; margin-right: 10px;" href="" class="btn btn-warning">Edit</a>
                          <a style="height: 40px; margin-right: 10px;" href="/mortgages/{{$mortgage->id}}/charge" class="btn btn-success">Pay Charge</a>
                          <a style="height: 40px; margin-right: 10px;" href="/mortgages/{{$mortgage->id}}/redeem" class="btn btn-danger">Redeem</a>
                          @endif
                        </div>
                      </td>
                      <td>{{$mortgage->user->name}}</td>
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
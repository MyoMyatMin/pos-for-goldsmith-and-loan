@extends('layouts.home')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daily Profits Panel</h1>
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
                <h3 class="card-title">Daily Profits</h3>
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
                    <th>Income</th>
                    <th>Expenditure</th>
                    <th>Profit</th>
                    <th>Create Date</th>
                    <th>Update Date</th>
                   
                </tr>
                </thead>
                <tbody>
                @foreach ($dailyProfits as $dailyProfit)
                    <tr class="{{$dailyProfit->confirmed ? 'table-danger' : 'table-success'}}">
                      
                      <td>{{$dailyProfit->income}}</td>
                      <td>{{$dailyProfit->expenditure}}</td>
                      <td>{{$dailyProfit->profit}}</td>
                      <td>{{$dailyProfit->created_at}}</td>
                      <td>{{$dailyProfit->updated_at}}</td>
                      
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
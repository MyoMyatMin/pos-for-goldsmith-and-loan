@extends('layouts.home')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Management Panel</h1>
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
                <h3 class="card-title">Today's Gold Price</h3>
                {{-- <a href="/mortgages/create" class="btn btn-success" style="float: right">Create</a> --}}
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
                <th>16</th>
                <th>15</th>
                <th>14</th>
                <th>Date</th>
                @admin
               <th>Action</th>
               @endadmin
            </tr>
            </thead>
            <tbody>
              <tr>
                  <td>{{$goldPrice->sixteen}}</td>
                  <td>{{$goldPrice->fifteen}}</td>
                  <td>{{$goldPrice->twelve}}</td>
                  <td>{{$goldPrice->updated_at}}</td>
                  @admin
                  <td>
                    <div class="form-row">
                      <a style=" height: 40px; margin-right: 10px;" href="/todayPrice/{{$goldPrice->id}}/edit" class="btn btn-warning">Edit</a>
                    </div> 
                  </td>
                  @endadmin
                </tr>
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
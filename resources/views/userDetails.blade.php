@extends('layouts.home')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$user->name}}'s details Panel</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-body">
          <div class="container">
            @if (session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
            @endif
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-3" >
                        <div class="card-header">
                          Sales
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Total Sales Counts</h5>
                          
                          <h3 class="card-text pt-3">{{$user->sales->count()}}</h3>
                          <a href="/users/{{$user->id}}/details/sales" class="btn btn-primary">See Details</a>
                        </div>
                      </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3" >
                        <div class="card-header">
                         Buybacks
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Total Buybacks Counts</h5>
                          
                          <h3 class="card-text pt-3"> {{$user->buyback->count()}}</h3>
                          
                          <a href="/users/{{$user->id}}/details/buybacks" class="btn btn-primary">See Details</a>
                        </div>
                      </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3" >
                        <div class="card-header">
                          Debts
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Total debts Counts</h5>
                          
                          <h3 class="card-text pt-3"> {{$user->debts->count()}}</h3>
                          <a href="/users/{{$user->id}}/details/debts" class="btn btn-primary">See Details</a>
                        </div>
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-3" >
                        <div class="card-header">
                          Mortgages
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Total Mortgages Counts</h5>
                          
                          <h3 class="card-text pt-3"> {{$user->mortgages->count()}}</h3>
                          <a href="/users/{{$user->id}}/details/mortgages" class="btn btn-primary">See Details</a>
                        </div>
                      </div>
                </div>
                <div class="col-lg-4">
                   <div class="card mb-3" >
                        <div class="card-header">
                         Redeem Counts
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Total Redeem Counts</h5>
                          
                          <h3 class="card-text pt-3"> {{$user->redeemItems->count()}}</h3>
                          
                          <a href="/users/{{$user->id}}/details/redeem" class="btn btn-primary">See Details</a>
                        </div>
                </div>        
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-header">
                          Charge Counts
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Total Charge Counts</h5>
                          
                          <h3 class="card-text pt-3"> {{$user->chargeAmount->count()}}</h3>
                          <a href="/users/{{$user->id}}/details/charge" class="btn btn-primary">See Details</a>
                        </div>
                      </div>
                </div>
            </div>
          
         
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
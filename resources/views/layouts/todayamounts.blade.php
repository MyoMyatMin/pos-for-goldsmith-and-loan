@extends('layouts.home')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Today's Amounts Panel</h1>
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
                          <h5 class="card-title">Total Sales Amounts</h5>
                          
                          <h3 class="card-text pt-3">{{$todayAmounts['sales']}} kyats</h3>
                          <a href="/sales" class="btn btn-primary">See Details</a>
                        </div>
                      </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3" >
                        <div class="card-header">
                         Buybacks
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Total Buybacks Amounts</h5>
                          
                          <h3 class="card-text pt-3">{{$todayAmounts['buybacks']}} kyats</h3>
                          
                          <a href="/buybacks" class="btn btn-primary">See Details</a>
                        </div>
                      </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3" >
                        <div class="card-header">
                          Debts
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Total Debts Amounts</h5>
                          
                          <h3 class="card-text pt-3">{{$todayAmounts['debts']}} kyats</h3>
                          <a href="/paidDebts" class="btn btn-primary">See Details</a>
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
                          <h5 class="card-title">Total Mortgages Amounts</h5>
                          
                          <h3 class="card-text pt-3">{{$todayAmounts['mortgages']}} kyats</h3>
                          <a href="/mortgages" class="btn btn-primary">See Details</a>
                        </div>
                      </div>
                </div>
                <div class="col-lg-4">
                   <div class="card mb-3" >
                        <div class="card-header">
                         Redeem Amounts
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Total Redeem Amounts</h5>
                          
                          <h3 class="card-text pt-3">{{$todayAmounts['redeem']}} kyats</h3>
                          
                          <a href="redeemlists" class="btn btn-primary">See Details</a>
                        </div>
                </div>        
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-header">
                          Charge Amounts
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Total Charge Amounts</h5>
                          
                          <h3 class="card-text pt-3">{{$todayAmounts['charge']}} kyats</h3>
                          <a href="/chargeamounts" class="btn btn-primary">See Details</a>
                        </div>
                      </div>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                  <div class="card mb-3" >
                      <div class="card-header">
                        Income
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Total Incomes</h5>
                        
                        <h3 class="card-text pt-3">{{$income}} kyats</h3>
                        
                      </div>
                    </div>
              </div>
              <div class="col-lg-6">
                 <div class="card mb-3 ">
                      <div class="card-header">
                       Expenditure
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Total Expenditure</h5>
                        
                        <h3 class="card-text pt-3">{{$expenditure}} kyats</h3>
                        
                        
                      </div>
              </div>        
              </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-3 text-center" >
                <div class="card-header">
                  Profits
                </div>
                <div class="card-body">
                  <h5>Profits</h5>
                  <form action="/todayAmounts"  method="POST">
                    @csrf
                    <div class="form-group">
                      
                      <input type="text" name="profit" value="{{$income - $expenditure}}" class="form-control">
                      <input type="text" value="{{$income}}" name="income" hidden>
                      <input type="text" value="{{$expenditure}}" name="expenditure" hidden>
                    </div>
                   <button class="btn btn-primary">Submit</button>
                  </form>
                  {{-- //<h3 class="card-text pt-3"> kyats</h3> --}}
                  
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
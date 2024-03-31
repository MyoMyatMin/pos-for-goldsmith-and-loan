@extends('layouts.home')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">"All charge amounts"</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Charge Amounts</h3>
                        </div>
                        <div class="card-body">
                        @if (session('message'))
                        <div class="alert alert-success">
                              {{ session('message') }}
                         </div>
                         @endif
                         <table id="dishes" class="table table-bordered table-striped"> 
                            <thead>
                                <tr>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Received by</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($chargeamounts as $chargeamount)
                                <tr>
                                    <td>{{$chargeamount->amount}}</td>
                                    <td>{{$chargeamount->created_at}}</td>
                                    <td>{{$chargeamount->user->name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                         </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
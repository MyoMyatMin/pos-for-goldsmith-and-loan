@extends('layouts.home')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vouncher</h1>
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
                <h3 class="card-title">Vouncher</h3>
                <a href="/mortgages" class="btn btn-success" style="float: right">Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if (session('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif
          <form action="/sales/create" method="POST">
            @csrf
            <input type="hidden" name="user_id"
                value="{{ auth()->user()->id }}">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" name="name" value="{{old('name')}}">
          </div>
          <div class="form-group"> 
               <label for="">Address</label>
              <input type="text" class="form-control" name="address" value="{{old('address')}}"></div>
          <div class="form-group"> 
               <label for="">items</label>
              <input type="text" class="form-control" name="items" value="{{old('items')}}">
          </div>
          <div class="row g-3">
              <div class="col">
                  <input type="number" name="kyat" class="form-control" placeholder="ကျပ် " id="kyat" value="{{$items['kyat'] ? $items['kyat']  : 0}}">
              </div>
              <div class="col">
                  <input type="number" name="pay" class="form-control" placeholder="ပဲ" id="pay" value="{{$items['pay']  ? $items['pay'] : 0}}">
              </div>
              <div class="col">
                  <input type="number" name="yway" class="form-control" placeholder="ရွေး" id="yway" value="{{$items['yway'] ? $items['yway']  : 0}}">
              </div>
          </div>
          <div class="my-3">
              <label for="">လျော့တွက်</label>
              <hr>
          </div>
          <div class="row g-3">
             <div class="col">
                <input type="number" name="ytpay" class="form-control" placeholder="ပဲ" id="ytpay" value="{{$items['payy']  ?   $items['payy']  : 0}}">
              </div>
              <div class="col">
                <input type="number" name="ytyway" class="form-control" placeholder="ရွေး" id="ywayy" value="{{$items['ywayy'] ? $items['ywayy']   : 0}}">
              </div>
          </div>
          <div class="form-group">
              <label for="">Amount</label>
              <input type="text" class="form-control" name="amount" value="{{$items['amount']}}">
            </div>
            <div class="form-group">
              <label>Purchase</label>
              <input type="text" class="form-control" name="purchaseAmt" />
            </div>
          @if($items['sign']) 
          <div class="form-group">
            <label for="">Price</label>
            <input type="text" class="form-control" name="price" value="{{$items['sign']}}">
         </div>  
         @else
         <div class="my-3">
          <select  name="quality" id="quality" class="form-select from-select-sm" required>
              <option value="" selected>Choose 16,15,12</option>
              <option value="16">16</option>
              <option value="15">15</option>
              <option value="12">12</option>
          </select>
        </div>
          @endif 
          
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

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
                <h3 class="card-title">Calculator</h3>
                <a href="/mortgages" class="btn btn-success" style="float: right">Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if (session('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif
          <form action="/vouncher" method="POST">
            @csrf
            <div class="my-3">
                <label for="">အလေးချိန်
                </label>
                <hr/>
            </div>
            <div class="row g-3">
                <div class="col">
                    <input type="number" name="kyat" class="form-control" placeholder="ကျပ် " id="kyat">
                </div>
                <div class="col">
                    <input type="number" name="pay" class="form-control" placeholder="ပဲ" id="pay">
                </div>
                <div class="col">
                    <input type="number" name="yway" class="form-control" placeholder="ရွေး" id="yway">
                </div>
            </div>
            <div class="my-3">
                <label for="">လျော့တွက်</label>
                <hr>
            </div>
            <div class="row g-3">
                <div class="col">
                    <input type="number" step="any" name="payy" class="form-control" placeholder="ပဲ" id="payy">
                </div>
                <div class="col">
                    <input type="number" step="any" name="ywayy" class="form-control" placeholder="ရွေး" id="ywayy">
                </div>
            </div>
            <div class="my-3">
                <select  name="sign" id="sign" class="form-select from-select-sm" required>
                    <option value="" selected>Choose 16,15,12</option>
                    <option value="{{$goldPrice->sixteen}}">16</option>
                    <option value="{{$goldPrice->fifteen}}">15</option>
                    <option value="{{$goldPrice->twelve}}">12</option>
                </select>
            </div>
           <div>
            <input type="text" value="0" id="amount" name="amount">
            <label for="">Here is  your amount.</label>
           </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <button onclick="calculate()" class="btn btn-warning" type="button">Calculate</button>
        </form>
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

<script>
    function calculate(){

        
       let kyat = parseFloat(document.getElementById('kyat').value);
      
       let pay = parseFloat(document.getElementById('pay').value);
       let  yway = parseFloat(document.getElementById('yway').value);
       let payy = parseFloat(document.getElementById('payy').value);
       let  ywayy= parseFloat(document.getElementById('ywayy').value);
       let  price = document.getElementById('sign').value;
      
       if(price == ''){
       alert('Please select values from  select-box'); return false;}
       else{
        price = parseFloat(price);
       }

       pay = pay + ( payy ? payy : 0);
       yway = yway + (ywayy ? ywayy : 0);
       if(yway >= 3.5){
            pay = pay + Math.floor(yway/3.5);
            yway = yway % 3.5;
       }

       if( pay >= 16){
        kyat = kyat + Math.floor(pay/3.5);
        pay = pay % 16
       }

       result = kyat + (pay ? pay/16 : 0) + (yway ? yway/56 : 0);
       amount = result * price;
       document.getElementById('amount').value = amount;
    }
</script>
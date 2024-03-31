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
        {{-- <div class="row">
          <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
                <h3 class="card-title">Mortgages</h3>
                <a href="/mortgages" class="btn btn-success" style="float: right">Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if (session('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif
          <form action="/mortgages/charge/{{$mortgages->id}}" method="POST">
            @csrf
           <div class="form-group">
            <label>Months</label>
            <input type="number" name="month" class="form-control" value="">
           </div>
        <button type="submit" class="btn btn-success">Submit</button>
        </form>
            </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Mortgages</h3>
                    <a href="/mortgages" class="btn btn-success" style="float: right">Back</a>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <form action="/mortgages/charged/{{$mortgages->id}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="date" name="update" class="form-control" value="{{$date ? $date : ''}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="amount" class="form-control" value="{{$totalamt}}">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
                </div>
            </div>
          </div>
        </div>
        <!-- /.row --> --}}
      </div><!-- /.container-fluid -->

      {{--- testing another form ---}}
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Testing Form</h3>
            </div>
            <div class="card-body">
              <form action="/mortgages/charged/{{$mortgages->id}}" method="POST">
                @csrf
                <input type="hidden" name="user_id"
                value="{{ auth()->user()->id }}">
                <div class="form-group">
                    <input type="text" name="month" id="month" class="form-control" value="">
                </div>
              <input type="hidden" name="amt" id="amt" value="{{$mortgages->amount}}">
              <input type="hidden" name="rate" id="rate" value="{{$mortgages->rate}}">
              <input type="hidden" name="update" id="update" value="{{date("Y-m-d",strtotime($mortgages->updated_at))}}">
              <div class="form-group">
                <label for="">Here is your amount.</label>
                <input type="text" name = "totalamt" id = "totalamt" class="form-control" value="0">
              </div>
              <div class="form-group">
                <label for="">Your update date will be</label>
                <input type="date" name="final" id="final" class="form-control">
              </div>
              <button onclick="calculate()" type="button" class="btn btn-primary" >Calculate</button>
              <button type="submit" onclick="return confirm('Are you sure you want to pay charge this item?');" class="btn btn-success">Submit</button>
             
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

<script>
  function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}
  function calculate(){
    let amt = parseInt(document.getElementById('amt').value);
    let rate = parseFloat(document.getElementById('rate').value);
    let month = parseInt(document.getElementById('month').value);
    let update = new Date(document.getElementById('update').value);
    update.setMonth(update.getMonth()+month)
   
    ans = amt * rate * month/100;
    document.getElementById('totalamt').value = ans
    document.getElementById('final').value = formatDate(update)
  }
</script>
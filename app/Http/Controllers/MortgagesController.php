<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMortgagesRequest;
use App\Http\Requests\UpdateMortgagesRequest;
use App\Models\chargeAmount;
use App\Models\Mortgages;
use Carbon\Carbon;

class MortgagesController extends Controller
{
    public function index()
    {
        $mortgages = Mortgages::all();
        // $first = $mortgages->first();
        // dd($first);
        // $date = $first->create_at;
        // dd($date);
        // $test = date('Y-m-d', strtotime("+3 months", $date));
        // dd($test);
        return view('mortgages.mortgages', compact('mortgages'));
    }

   
    public function create()
    {
        return view('mortgages.create');
    }

  
    public function store()
    {
        // Mortgages::create(array_merge($this->validateMortgage(), [
        //     'create' => Carbon::now(),
        //     'update' => Carbon::now()
        // ]));
        Mortgages::create($this->validateMortgage());
        return redirect('/mortgages');
    }

    
    public function show(Mortgages $mortgages)
    {
    }

    public function edit(Mortgages $mortgages)
    {
        //
    }

   
    public function update(UpdateMortgagesRequest $request, Mortgages $mortgages)
    {
        //
    }

   
    public function destroy(Mortgages $mortgages)
    {
        //
    }

    public function showChargeform(Mortgages $mortgages)
    {
        //dd($mortgages);
        return view('mortgages.chargeform', compact('mortgages'));
    }

    //two forms methods
    // public function calculate(Mortgages $mortgages)
    // {
    //     $date = strtotime($mortgages->updated_at);
    //     // dd($date);
    //     $amount = $mortgages->amount;
    //     $rate = $mortgages->rate;
    //     $int = request('month');
    //     $date = date('Y-m-d', strtotime("+$int months", $date));
       
    //     $totalamt = $amount * $int * $rate / 100;
    //     return view('mortgages.chargeform', compact('mortgages', 'date', 'totalamt'));
    // }

    public function charged(Mortgages $mortgages)
    {
        $update = request()->final;
        $mortgages->updated_at = $update;
        $mortgages->save();

        $val = new chargeAmount();
        $val->user_id = request()->user_id;
        $val->amount = request()->totalamt;
        $val->save();

        return redirect('/mortgages');
    }

    protected function validateMortgage(?Mortgages $Mortgage = null): array
    {
        $Mortgage ??= new Mortgages();

        return request()->validate([
            'name' => 'required',
            'user_id' =>'required',
            'address' => 'required',
            'amount' => 'required',
            'weight' => 'required',
            'rate' => 'required',
            'items' => 'required'
        ]);
    }
}

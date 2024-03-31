<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDailyProfitsRequest;
use App\Http\Requests\UpdateDailyProfitsRequest;
use App\Models\DailyProfits;

use App\Models\Buyback;
use App\Models\chargeAmount;
use App\Models\debts;
use App\Models\Mortgages;
use App\Models\RedeemedItems;
use App\Models\Sales;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DailyProfitsController extends Controller
{
    public function index()
    {
        $dailyProfits = DailyProfits::all();
        return view('dailyprofits.dailyprofits', compact('dailyProfits'));
    }

    public function create()
    {
        //
    }

    public function store(StoreDailyProfitsRequest $request)
    {
        $today = Carbon::now()->toDateString();
        
        $latest = DailyProfits::latest()->first();
        // if($latest == null) {
        //     dd("hi");
        // }
        if ($latest !== null && $today === $latest->updated_at->toDateString()) {
            if ($request->only(['income', 'expenditure', 'profit']) === $latest->only(['income', 'expenditure', 'profit'])) {
                return redirect('/todayAmounts')->with("message", "You are Duplicating.");
            } else {
                $latest->update($request->only(['income', 'expenditure', 'profit']));
            }
        } else {
            DailyProfits::create($request->only(['income', 'expenditure', 'profit']));
        }
        
        return redirect('/dailyProfits');
        
    }

    public function show(DailyProfits $dailyProfits)
    {
        //
    }

   
    public function edit(DailyProfits $dailyProfits)
    {
        //
    }

   
    public function update(UpdateDailyProfitsRequest $request, DailyProfits $dailyProfits)
    {
        //
    }

   
    public function destroy(DailyProfits $dailyProfits)
    {
        //
    }

    public function todayAmounts()
    {
        $sales = (Sales::whereDate('created_at', '=', Carbon::today()->toDateString())->get())->sum('purchaseAmt');
        $debts = (debts::whereDate('created_at', '=', Carbon::today()->toDateString())->get())->sum('amounts');
        $buybacks = (Buyback::whereDate('created_at', '=', Carbon::today()->toDateString())->get())->sum('amount');
        $mortgages = (Mortgages::whereDate('created_at', '=', Carbon::today()->toDateString())->get())->sum('amount');
        $charge = (chargeAmount::whereDate('created_at', '=', Carbon::today()->toDateString())->get())->sum('amount');
        $redeem = (RedeemedItems::whereDate('created_at', '=', Carbon::today()->toDateString())->get())->sum('totalAmount');

     
        $todayAmounts = array('sales' => $sales,
            'debts' => $debts,
            'buybacks' => $buybacks,
            'mortgages' => $mortgages,
            'charge' => $charge,
            'redeem' => $redeem);
        
        $income = $sales + $debts + $redeem + $charge;
        $expenditure = $buybacks + $mortgages;
        return view('layouts.todayamounts', compact('todayAmounts', 'income', 'expenditure'));
    }
}

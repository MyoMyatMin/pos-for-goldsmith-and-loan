<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRedeemedItemsRequest;
use App\Http\Requests\UpdateRedeemedItemsRequest;
use App\Models\Mortgages;
use App\Models\RedeemedItems;
use DateTime;

class RedeemedItemsController extends Controller
{
    public function index()
    {
        $redeem = RedeemedItems::all();
        return view('mortgages.redeemlists', compact('redeem'));
    }

  
    public function showForm(Mortgages $mortgages)
    {
        $originalAmt = $mortgages->amount;
        $rate = $mortgages->rate;
        $tdy = new DateTime();
        $update = new DateTime($mortgages->updated_at);
        $diff = date_diff($update, $tdy);
        $year = $diff->format('%R%y');
        $month = $diff->format('%R%m');
        $day = $diff->format('%R%d');

        if ($year >= 1) {
            $month = ($year*12)+$month;
        }

        if ($day == 0) {
            $charge  = $originalAmt * $month * $rate / 100;
        } elseif ($day <= 15) {
            $charge  = $originalAmt * ($month + 0.5) * $rate / 100;
        } else {
            $charge  = $originalAmt * ($month + 1) * $rate / 100;
        }

        $total = $charge + $originalAmt;
        
        return view('mortgages.redeemform', compact('mortgages', 'total', 'charge'));
    }
    public function redeem(Mortgages $mortgages)
    {
        $mortgages->confirmed = 1;
        $mortgages->save();

        $redeem = new RedeemedItems();
        $redeem->name = request()->name;
        $redeem->address = request()->address;
        $redeem->items = request()->items;
        $redeem->weight = request()->weight;
        $redeem->amount = request()->amount;
        $redeem->charge = request()->charge;
        $redeem->totalAmount = request()->total;
        $redeem->user_id = request()->user_id;
        $redeem->save();

        return redirect('/redeemlists');
    }
}

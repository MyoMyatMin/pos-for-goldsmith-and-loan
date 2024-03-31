<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorechargeAmountRequest;
use App\Http\Requests\UpdatechargeAmountRequest;
use App\Models\chargeAmount;

class ChargeAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chargeamounts = chargeAmount::all();
        return view('mortgages.chargeamount', compact('chargeamounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorechargeAmountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorechargeAmountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chargeAmount  $chargeAmount
     * @return \Illuminate\Http\Response
     */
    public function show(chargeAmount $chargeAmount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chargeAmount  $chargeAmount
     * @return \Illuminate\Http\Response
     */
    public function edit(chargeAmount $chargeAmount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatechargeAmountRequest  $request
     * @param  \App\Models\chargeAmount  $chargeAmount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatechargeAmountRequest $request, chargeAmount $chargeAmount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chargeAmount  $chargeAmount
     * @return \Illuminate\Http\Response
     */
    public function destroy(chargeAmount $chargeAmount)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGoldPriceRequest;
use App\Http\Requests\UpdateGoldPriceRequest;
use App\Models\GoldPrice;

class GoldPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goldPrice = GoldPrice::latest()->first();
        return view('todayPrice', compact('goldPrice'));
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
     * @param  \App\Http\Requests\StoreGoldPriceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGoldPriceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GoldPrice  $goldPrice
     * @return \Illuminate\Http\Response
     */
    public function show(GoldPrice $goldPrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GoldPrice  $goldPrice
     * @return \Illuminate\Http\Response
     */
    public function edit(GoldPrice $goldPrice)
    {
        return view('todayPriceEdit', compact('goldPrice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGoldPriceRequest  $request
     * @param  \App\Models\GoldPrice  $goldPrice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGoldPriceRequest $request, GoldPrice $goldPrice)
    {
        $goldPrice->sixteen = $request->sixteen;
        $goldPrice->fifteen = $request->fifteen;
        $goldPrice->twelve = $request->twelve;
        $goldPrice->save();
        return redirect('/todayPrice');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\GoldPrice  $goldPrice
    * @return \Illuminate\Http\Response
    */
    public function destroy(GoldPrice $goldPrice)
    {
        //
    }
}

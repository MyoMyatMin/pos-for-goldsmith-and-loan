<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuybackRequest;
use App\Http\Requests\UpdateBuybackRequest;
use App\Models\Buyback;

class BuybackController extends Controller
{
    public function index()
    {
        $buybacks = Buyback::latest()->get();
        return view('buybacks.buybacks', compact('buybacks'));
    }

    public function create()
    {
        return view('buybacks.buybackform');
    }

    public function store(StoreBuybackRequest $request)
    {
        Buyback::create($this->validateBuyback());
        return redirect('/buybacks');
    }

    public function show(Buyback $buyback)
    {
    }

   
    public function edit(Buyback $buyback)
    {
        //
    }

    public function update(UpdateBuybackRequest $request, Buyback $buyback)
    {
        //
    }

    public function destroy(Buyback $buyback)
    {
        //
    }

    protected function validateBuyback(?Buyback $Buyback = null): array
    {
        $Buyback ??= new Buyback();

        return request()->validate([
            'name' => 'required',
            'user_id' => 'required',
            'address' => 'required',
            'amount' => 'required',
            'items' => 'required',
            'kyat' => 'required',
            'pay' => 'required',
            'yway' => 'required',
            'quality' => 'required'
        ]);
    }
}

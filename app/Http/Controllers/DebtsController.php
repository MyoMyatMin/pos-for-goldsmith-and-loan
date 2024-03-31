<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredebtsRequest;
use App\Http\Requests\UpdatedebtsRequest;
use App\Models\debts;

class DebtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paidDebts = debts::latest()->get();
        return view('sales.paidDebts', compact('paidDebts'));
    }
}

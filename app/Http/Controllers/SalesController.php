<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use App\Models\debts;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use App\Models\GoldPrice;
use App\Models\User;
use Illuminate\Support\Facades\DB as FacadesDB;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::latest()->get();
        return view('sales.sales', compact('sales'));
    }

    public function show(Sales $sale)
    {
        return view('sales.saledetail', compact('sale'));
    }

    public function store()
    {
        $goldPrice = GoldPrice::latest()->first();
        //dd($goldPrice);
        $qtyprices = ['16'=>$goldPrice->sixteen,'15'=>$goldPrice->fifteen,'12'=>$goldPrice->twelve];

        if (request()->quality) {
            $quality = request()->quality;
            $price = $qtyprices[$quality];
        } else {
            $price = request()->price;
            $quality_array = array_flip($qtyprices);
            $quality = $quality_array[$price];
        }
        
        $debt = request()->amount -  request()->purchaseAmt;
        
        if ($debt == 0) {
            $remarks = "No debt left" ;
        } else {
            // dd("works");
            $remarks = "You have $debt to pay." ;
        }
        
        Sales::create(array_merge($this->validateSales(), [
            'price' => $price,
            'quality' => $quality,
            'debt' => $debt,
            'remarks' => '<p>' . $remarks . '</p>'
        ]));
        return redirect('/sales');
    }


    public function calculator()
    {
        $goldPrice = GoldPrice::latest()->first();
        return view('sales.calculator', compact('goldPrice'));
    }

    public function vouncher(Request $request)
    {
        $items = array();
        $items = $request->input();
        return view('sales.vouncher', compact('items'));
    }


    public function plainVouncher()
    {
        $items = array("kyat" => null,"pay" => null,"yway" => null,"payy" => null,"ywayy" => null,"sign" => null,"amount" => null);
        return view('sales.vouncher', compact('items'));
    }

    public function debtForm(Sales $sale)
    {
        return view('sales.debtform', compact('sale'));
    }

    public function giveDebt(Sales $sale)
    {
        $user_id = request()->user_id;
        $user = User::find($user_id)->name;
        $name = $sale->name;
        $giveamt = request()->amt;
        $debt = $sale->debt - $giveamt;
        $remarks = $sale->remarks;
        $tdy = date('Y-m-d');
        $remarks = $remarks . '<p>' . "You paid $giveamt at $tdy. Received By $user. " . '</p>';
        
        if ($debt > 0) {
            $remarks = $remarks . '<p>' . "You still have $debt to pay." . '</p>';
        } else {
            $remarks = $remarks . '<p>' . "No debt left." . '<p/>';
        }

        $sale->purchaseAmt = $sale->purchaseAmt + $giveamt;
        $sale->debt = $debt;
        $sale->remarks = $remarks;
        $sale->save();

        $debtamt = new debts();
        $debtamt->name = $name;
        $debtamt->user_id = request()->user_id;
        $debtamt->amounts = $giveamt;
        $debtamt->save();
        return redirect('/sales');
    }


    public function debtLists(Sales $sale)
    {
        $debts =  Sales::whereNot('debt', 0)->get();
       
        return view('sales.debtlists', compact('debts'));
    }

    public function searchByDate()
    {
        // $starting =  Carbon::parse(request()->starting)->startOfDay();
        // $ending = Carbon::parse(request()->ending)->endOfDay();
        $starting = request()->starting;
        $ending = request()->ending;
        // dd($ending);
        if (!$ending) {
            $sales = Sales::whereBetween('created_at', [$starting." 00:00:00",$starting." 23:59:59"])->get();
        } else {
            $sales = Sales::whereBetween('created_at', [$starting." 00:00:00",$ending. " 23:59:59"])->get();
        }

        // $sales = DB::table('sales')->where('created_at', '>=', $starting)
        //                                     ->where('created_at', '=<', $ending)
        //                                     ->get();
        // // dd($sales);
        return view('sales.sales', compact('sales'));
    }

    protected function validateSales(?Sales $sales = null): array
    {
        $Sales ??= new Sales();

        return request()->validate([
            'user_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'amount' => 'required',
            'items' => 'required',
            'kyat' => 'required',
            'pay' => 'required',
            'yway' => 'required',
            'ytpay' => 'required',
            'ytyway' => 'required',
            'purchaseAmt' => 'required'
        ]);
    }
}

<?php

use App\Http\Controllers\BuybackController;
use App\Http\Controllers\ChargeAmountController;
use App\Http\Controllers\DailyProfitsController;
use App\Http\Controllers\DebtsController;
use App\Http\Controllers\GoldPriceController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MortgagesController;
use App\Http\Controllers\RedeemedItemsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\todayamounts;
use App\Models\RedeemedItems;
use App\Models\Sales;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/logs', function () {
    return file_get_contents(storage_path('logs/laravel.log'));
});
Route::get('/db-test', function () {
    try {
        \DB::connection()->getPdo();
        return 'Database connection is working';
    } catch (\Exception $e) {
        return 'Error connecting to database: ' . $e->getMessage();
    }
});


Route::get('/mortgages', [MortgagesController::class,'index'])->middleware('auth');

Route::get('/mortgages/create', [MortgagesController::class,'create'])->middleware('auth');
Route::post('/mortgages/create', [MortgagesController::class,'store'])->middleware('auth');

Route::get('/mortgages/{mortgages}/charge', [MortgagesController::class,'showChargeform'])->middleware('auth');
// Route::post('/mortgages/charge/{mortgages}', [MortgagesController::class,'calculate'])->middleware('auth'); //two forms method
Route::post('/mortgages/charged/{mortgages}', [MortgagesController::class,'charged'])->middleware('auth');

Route::get('/chargeamounts', [ChargeAmountController::class,'index'])->middleware('auth');

Route::get('/mortgages/{mortgages}/redeem', [RedeemedItemsController::class,'showForm'])->middleware('auth');
Route::post('/mortgages/{mortgages}/redeemed', [RedeemedItemsController::class,'redeem'])->middleware('auth');

Route::get('/redeemlists', [RedeemedItemsController::class,'index'])->middleware('auth');

Route::get('/calculator', [SalesController::class,'calculator'])->middleware('auth');

Route::get('/plainvouncher', [SalesController::class,'plainVouncher'])->middleware('auth');
Route::post('/vouncher', [SalesController::class,'vouncher'])->middleware('auth');

Route::post('/sales/create', [SalesController::class,'store'])->middleware('auth');
Route::get('/sales', [SalesController::class,'index'])->middleware('auth');
Route::get('/sales/{sale}', [SalesController::class,'show'])->middleware('auth');
Route::get('/sales/{sale}/debt', [SalesController::class,'debtForm'])->middleware('auth');
Route::post('/sales/{sale}/debt', [SalesController::class,'giveDebt'])->middleware('auth');
Route::get('/debtlists', [SalesController::class,'debtLists'])->middleware('auth');
Route::post('/sales', [SalesController::class,'searchByDate'])->middleware('auth');

Route::get('/paidDebts', [DebtsController::class,'index'])->middleware('auth');

Route::get('/buybacks/create', [BuybackController::class,'create'])->middleware('auth');
Route::post('/buybacks/create', [BuybackController::class,'store'])->middleware('auth');
Route::get('/buybacks', [BuybackController::class,'index'])->middleware('auth');

Route::get('/todayPrice', [GoldPriceController::class, 'index'])->middleware('auth');

Route::post('/login', [LoginController::class,'check'])->middleware('guest');
Route::post('/logout', [LoginController::class,'destroy'])->middleware(('auth'));

Route::middleware('can:admin')->group(function () {
    Route::get('/register', [LoginController::class,'show']);
    Route::post('/register', [LoginController::class,'store']);
    Route::get('/users', [LoginController::class,'index']);
    Route::get('/users/{user}/details', [LoginController::class,'details']);
    Route::get('/todayPrice/{goldPrice}/edit', [GoldPriceController::class,'edit']);
    Route::post('/todayPrice/{goldPrice}/edit', [GoldPriceController::class,'update']);
    Route::get('/todayAmounts', [DailyProfitsController::class,'todayAmounts']);
    Route::post('/todayAmounts', [DailyProfitsController::class,'store']);
    Route::get('/dailyProfits', [DailyProfitsController::class,'index']);
    Route::get('/users/{user}/details/sales', [LoginController::class,'salesdetails']);
    Route::get('/users/{user}/details/buybacks', [LoginController::class,'buybacksdetails']);
    Route::get('/users/{user}/details/debts', [LoginController::class,'debtsdetails']);
    Route::get('/users/{user}/details/mortgages', [LoginController::class,'mortgagesdetails']);
    Route::get('/users/{user}/details/redeem', [LoginController::class,'redeemdetails']);
    Route::get('/users/{user}/details/charge', [LoginController::class,'chargedetails']);
});

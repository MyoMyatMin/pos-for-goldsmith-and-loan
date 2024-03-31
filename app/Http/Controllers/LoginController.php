<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function check()
    {
        $attributes = request()->validate([
         'email' => 'required|email',
         'password' => 'required'
        ]);
        // dd($attributes);
        if (auth()->attempt($attributes)) {
            return redirect('/sales');
        } else {
            return redirect('/')->with("errors", "Error in Log in.");
        }
        // $user = User::where('email', 'bernice01@example.net')->first();

        // // dd($user->password);
        // if ($user) {
        //     if (Hash::check('password', $user->password)) {
        //         dd('ture');
        //         return redirect('/sales');
        //     } else {
        //         dd('false');
        //     };
        // }
    }

    public function show()
    {
        return view('register');
    }

    public function store()
    {
        $attributes =  request()->validate([
             'name' => 'required',
             'email' => 'required',
             'password' => 'required'
         ]);
        $attributes['password'] = bcrypt($attributes['password']);
        User::create($attributes);
        return redirect('/users');
    }

    public function index()
    {
        $users = User::latest()->get();
        return view('users', compact('users'));
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }

    public function details(User $user)
    {
        // $test  =$user->sales;
        // dd($test);
        return view('userDetails', compact('user'));
    }

    public function salesdetails(User $user)
    {
        $userSales = $user->sales;
        return view("eachDetails.userSalesDetails", compact('userSales'));
    }

    public function buybacksdetails(User $user)
    {
        $userbuybacks = $user->buyback;
        return view("eachDetails.userbuybacksDetails", compact('userbuybacks'));
    }

    public function debtsdetails(User $user)
    {
        $userdebts = $user->debts;
        return view("eachDetails.userdebtsDetails", compact('userdebts'));
    }

    public function mortgagesdetails(User $user)
    {
        $usermortgages = $user->mortgages;
        return view("eachDetails.usermortgagesDetails", compact('usermortgages'));
    }

    public function redeemdetails(User $user)
    {
        $userredeem = $user->redeemItems;
        return view("eachDetails.userredeemDetails", compact('userredeem'));
    }

    public function chargedetails(User $user)
    {
        $usercharges = $user->chargeAmount;
        return view("eachDetails.userchargeDetails", compact('usercharges'));
    }
}

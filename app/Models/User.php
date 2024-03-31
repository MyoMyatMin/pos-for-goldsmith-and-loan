<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [];
    
    public function sales()
    {
        return $this->hasMany(Sales::class);
    }

    public function mortgages()
    {
        return $this->hasMany(Mortgages::class);
    }

    public function debts()
    {
        return $this->hasMany(debts::class);
    }

    public function redeemItems()
    {
        return $this->hasMany(RedeemedItems::class);
    }

    public function buyback()
    {
        return $this->hasMany(Buyback::class);
    }

    public function chargeAmount()
    {
        return $this->hasMany(chargeAmount::class);
    }
}

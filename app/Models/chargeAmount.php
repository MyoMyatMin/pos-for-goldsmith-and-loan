<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chargeAmount extends Model
{
    use HasFactory;
    const UPDATE_AT = null;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    public function trends()
    {
        return $this->hasMany(Trend::class);
    }

    public function dollarRate()
    {
        return $this->hasOne(DollarRate::class);
    }
}

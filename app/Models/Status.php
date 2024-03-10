<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function trends()
    {
        return $this->hasMany(Trend::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DollarRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'rate',
        'series_id'
    ];

    public function series()
    {
        return $this->belongsTo(Series::class);
    }
}

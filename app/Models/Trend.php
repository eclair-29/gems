<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trend extends Model
{
    use HasFactory;

    protected $fillable = [
        'series_id',
        'status_id',
        'purchase_id'
    ];

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    public function purchaseType()
    {
        return $this->belongsTo(PurchaseType::class);
    }

    public function purchaseCategory()
    {
        return $this->belongsTo(PurchaseCategory::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function trends()
    {
        return $this->hasMany(Trend::class);
    }
}

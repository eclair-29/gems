<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseCategory extends Model
{
    use HasFactory;

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function purchaseTypes()
    {
        return $this->hasMany(PurchaseType::class);
    }
}

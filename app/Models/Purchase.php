<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'purchase_type_id',
        'purchase_category_id',
        'status_id',
        'allocated_budget_php',
        'allocated_budget_usd',
        'notes',
        'series_id',
        'dept_id',
    ];

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

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function trends()
    {
        return $this->hasMany(Trend::class);
    }

    public function dept()
    {
        return $this->belongsTo(Dept::class);
    }
}

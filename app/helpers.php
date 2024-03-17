<?php

use App\Models\Dept;
use App\Models\DollarPesoRate;
use App\Models\Status;
use App\Models\PurchaseType;
use App\Models\PurchaseCategory;
use App\Models\Tracking;

function getActiveStatusByCategory($category)
{
    $status = Status::select('id')
        ->where('category', $category)
        ->where('description', 'active')
        ->first();

    return $status;
}

function getPurchases($series)
{
    $query = DB::select(
        "SELECT 
            p.id,
            d.description as 'dept',
            p.description,
            pc.description as 'purchase_category',
            pt.description as 'purchase_type',
            dr.rate as 'dollar_rate',
            p.allocated_budget_php,
            p.allocated_budget_usd,
            se.fiscal_description as 'fiscal',
            se.series_description as 'series',
            s.description as 'status',
            p.notes,
            if(p.updated_at is null, p.created_at, p.updated_at) as 'updated_at'
        FROM purchases p
            LEFT JOIN purchase_categories pc ON p.purchase_category_id = pc.id
            LEFT JOIN purchase_types pt ON p.purchase_type_id = pt.id
            LEFT JOIN statuses s ON p.status_id = s.id
            LEFT JOIN series se ON p.series_id = se.id
            LEFT JOIN depts d ON p.dept_id = d.id
            LEFT JOIN dollar_rates dr ON se.id = dr.series_id
        WHERE p.series_id = ?",
        [$series]
    );

    return $query;
}

function createActionLog($user, $action, $log)
{
    Tracking::create([
        'user_id' => $user->id,
        'action_id' => $action->id,
        'log' => $log
    ]);
}

function getPurchaseTypeByDescription($description)
{
    $purchaseType = PurchaseType::select('id')
        ->where('description', $description)
        ->first();

    return $purchaseType;
}

function getPurchaseCategoryByDescription($description)
{
    $purchaseCategory = PurchaseCategory::select('id')
        ->where('description', $description)
        ->first();

    return $purchaseCategory;
}

function getDeptByDescription($description)
{
    $dept = Dept::select('id')
        ->where('description', $description)
        ->first();

    return $dept;
}

function getCurrentDollarPesoRate()
{
    $dollarRate = DollarPesoRate::latest()->first();
    return $dollarRate;
}

<?php

use App\Models\Status;

function getActiveStatusByCategory($category)
{
    $status = Status::select('id')
        ->where('category', $category)
        ->where('description', 'active')
        ->first();

    return $status;
}

function getPurchases()
{
    $query = DB::select(
        "SELECT 
            p.id,
            p.description,
            pc.description as 'purchase_category',
            pt.description as 'purchase_type',
            s.description as 'status',
            p.default_expense_php,
            p.default_expense_usd,
            p.notes,
            if(p.updated_at is null, p.created_at, p.updated_at) as 'updated_at'
        FROM purchases p
            LEFT JOIN purchase_categories pc ON p.purchase_category_id = pc.id
            LEFT JOIN purchase_types pt ON p.purchase_type_id = pt.id
            LEFT JOIN statuses s ON p.status_id = s.id",
    );

    return $query;
}

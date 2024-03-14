<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PurchaseTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $purchase_types = [
            ['description' => 'Cleaning', 'created_at' => $date],
            ['description' => 'Supplies', 'created_at' => $date],
            ['description' => 'Utilities', 'created_at' => $date],
            ['description' => 'Rental', 'created_at' => $date],
            ['description' => 'Repair and Maintenance', 'created_at' => $date],
            ['description' => 'Transportation', 'created_at' => $date],
            ['description' => 'Dues and Subscription', 'created_at' => $date],
            ['description' => 'Taxes and Dues', 'created_at' => $date],
            ['description' => 'Insurance', 'created_at' => $date],
            ['description' => 'Professional Consulting', 'created_at' => $date],
            ['description' => 'Labor Expense', 'created_at' => $date],
            ['description' => 'Communication', 'created_at' => $date],
        ];

        foreach ($purchase_types as $type) {
            DB::table('purchase_types')->insert($type);
        }
    }
}

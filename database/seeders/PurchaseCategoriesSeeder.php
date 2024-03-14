<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PurchaseCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $purchase_categories = [
            ['description' => 'Office and Cleaning Supplies', 'created_at' => $date],
            ['description' => 'Canteen Services', 'created_at' => $date],
            ['description' => 'Company Car Services', 'created_at' => $date],
            ['description' => 'Dues and Subscription', 'created_at' => $date],
            ['description' => 'Expats House Utilities', 'created_at' => $date],
            ['description' => 'Expats House Rentals', 'created_at' => $date],
            ['description' => 'Japanese Legal Documents', 'created_at' => $date],
            ['description' => 'Copier Machine Rental', 'created_at' => $date],
            ['description' => 'Service Personnel Labor Cost', 'created_at' => $date],
            ['description' => 'Communication Service', 'created_at' => $date],
            ['description' => 'Others', 'created_at' => $date],
            ['description' => '3Q6S Improvement', 'created_at' => $date],
        ];

        foreach ($purchase_categories as $category) {
            DB::table('purchase_categories')->insert($category);
        }
    }
}

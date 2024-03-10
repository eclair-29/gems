<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $statuses = [
            // purchase status
            ['category' => 'purchase', 'description' => 'active', 'created_at' => $date],
            ['category' => 'purchase', 'description' => 'inactive', 'created_at' => $date],

            // consolidated trend status
            ['category' => 'trend', 'description' => 'draft', 'created_at' => $date],
            ['category' => 'trend', 'description' => 'published', 'created_at' => $date],
            ['category' => 'trend', 'description' => 'for approval', 'created_at' => $date],
            ['category' => 'trend', 'description' => 'rejected', 'created_at' => $date],

            // ticket status
            ['category' => 'ticket', 'description' => 'pending',  'created_at' => $date],
            ['category' => 'ticket', 'description' => 'approved', 'created_at' => $date],
            ['category' => 'ticket', 'description' => 'rejected', 'created_at' => $date],
        ];

        foreach ($statuses as $status) {
            DB::table('statuses')->insert($status);
        }
    }
}

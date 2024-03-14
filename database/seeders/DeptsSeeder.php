<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DeptsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $depts = [
            ['description' => 'General Services', 'created_at' => $date],
        ];

        foreach ($depts as $dept) {
            DB::table('depts')->insert($dept);
        }
    }
}

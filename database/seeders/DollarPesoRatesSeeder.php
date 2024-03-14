<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DollarPesoRatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $dollar_peso_rates = [
            ['rate' => 56.65, 'created_at' => $date],
        ];

        foreach ($dollar_peso_rates as $rate) {
            DB::table('dollar_peso_rates')->insert($rate);
        }
    }
}

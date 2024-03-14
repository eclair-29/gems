<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $seriesList = [
            ['fiscal' => '2023_H2', 'series' => '2024_03', 'fiscal_description' => '2023 2nd Half', 'series_description' => 'Mar 2024', 'created_at' => $date],
            ['fiscal' => '2024_H1', 'series' => '2024_04', 'fiscal_description' => '2024 1st Half', 'series_description' => 'Apr 2024', 'created_at' => $date],
            ['fiscal' => '2024_H1', 'series' => '2024_05', 'fiscal_description' => '2024 1st Half', 'series_description' => 'May 2024', 'created_at' => $date],
            ['fiscal' => '2024_H1', 'series' => '2024_06', 'fiscal_description' => '2024 1st Half', 'series_description' => 'Jun 2024', 'created_at' => $date],
            ['fiscal' => '2024_H1', 'series' => '2024_07', 'fiscal_description' => '2024 1st Half', 'series_description' => 'Jul 2024', 'created_at' => $date],
            ['fiscal' => '2024_H1', 'series' => '2024_09', 'fiscal_description' => '2024 1st Half', 'series_description' => 'Aug 2024', 'created_at' => $date],
            ['fiscal' => '2024_H1', 'series' => '2024_09', 'fiscal_description' => '2024 1st Half', 'series_description' => 'Sep 2024', 'created_at' => $date],
            ['fiscal' => '2024_H1', 'series' => '2024_10', 'fiscal_description' => '2024 1st Half', 'series_description' => 'Oct 2024', 'created_at' => $date],
            ['fiscal' => '2024_H2', 'series' => '2024_11', 'fiscal_description' => '2024 1st Half', 'series_description' => 'Nov 2024', 'created_at' => $date],
            ['fiscal' => '2024_H2', 'series' => '2024_12', 'fiscal_description' => '2024 1st Half', 'series_description' => 'Dec 2024', 'created_at' => $date],
        ];

        foreach ($seriesList as $series) {
            DB::table('series')->insert($series);
        }
    }
}

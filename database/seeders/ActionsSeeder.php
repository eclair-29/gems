<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $actions = [
            ['resource' => 'publisher', 'description' => 'generate worksheet', 'created_at' => $date],
            ['resource' => 'publisher', 'description' => 'draft worksheet', 'created_at' => $date],
            ['resource' => 'publisher', 'description' => 'publish worksheet', 'created_at' => $date],

            ['resource' => 'publisher', 'description' => 'update purchase', 'created_at' => $date],
            ['resource' => 'publisher', 'description' => 'deactivate purchase', 'created_at' => $date],
            ['resource' => 'publisher', 'description' => 'add purchase', 'created_at' => $date],

            // ['resource' => 'approver', 'description' => 'approve worksheet', 'created_at' => $date],
            // ['resource' => 'approver', 'description' => 'approve add purchase', 'created_at' => $date],
            // ['resource' => 'approver', 'description' => 'approve update purchase', 'created_at' => $date],
            ['resource' => 'approver', 'description' => 'approve request', 'created_at' => $date],
            ['resource' => 'approver', 'description' => 'reject request', 'created_at' => $date],
        ];

        foreach ($actions as $action) {
            DB::table('actions')->insert($action);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create(['name' => 'Plan #1', 'price' => 20, 'price_max' => 99, 'time' => 120]);
        Plan::create(['name' => 'Plan #2', 'price' => 100, 'price_max' => 499, 'time' => 60]);
        Plan::create(['name' => 'Plan #3', 'price' => 500, 'price_max' => 999, 'time' => 20]);
    }
}

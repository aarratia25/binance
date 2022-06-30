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
        Plan::create(['name' => 'Plan #1', 'amount_from' => 20, 'amount_to' => 99]);
        Plan::create(['name' => 'Plan #2', 'amount_from' => 100, 'amount_to' => 499]);
        Plan::create(['name' => 'Plan #3', 'amount_from' => 500, 'amount_to' => 999]);
    }
}
